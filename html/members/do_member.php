<?php
require_once('../includes/functions.php');
//prevent access if they haven't submitted the form.
if (!isset($_POST['submit'])) {
    die(header("Location: new_member.php"));
}
$_SESSION['formAttempt'] = true;
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
$_SESSION['error'] = array();
$required = array("email","userid","password1","password2");
//Check required fields
foreach ($required as $requiredField) {
if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
        $_SESSION['error'][] = $requiredField . " is required.";
    }
}
if (!preg_match('/^[^\/.%\\@?]*$/',$_POST['userid'])) {
    $_SESSION['error'][] = "User ID should not have the following characters: /.%\@?";
} 
if (!preg_match('/^[A-Za-z0-9.\/]*$/',$_POST['password1'])) {
   $_SESSION['error'][] = "Password should only consist of lower or uppercase letters, numbers, full stop(period) or forward slash.";
} else if (strlen($_POST['password1']) <6) {
        $_SESSION['error'][] = "Password should be no less than 6 characters";
} else if ($_POST['password1'] != $_POST['password2']) {
    $_SESSION['error'][] = "Passwords don't match";
}
if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'][] = "Invalid E-mail address";
}


//final disposition
if (count($_SESSION['error']) > 0) {
    die(header("Location: new_member.php"));
} else {
    if(registerUser($_POST)) {
        unset($_SESSION['formAttempt']);
        die(header("Location: member_success.php"));
    } else {
		error_log("Problem registering user: {$_POST['userid']}");
        $_SESSION['error'][] = "Problem registering account";
        die(header("Location: new_member.php"));
    }
}
function registerUser($userData) {
    $mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
    if ($mysqli->connect_errno) {
        error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
        return false;
    }

    $email = $mysqli->real_escape_string($_POST['email']);
	$userid = $mysqli->real_escape_string($_POST['userid']);
    $password = $mysqli->real_escape_string($_POST['password1']);
    $cryptedPassword =  better_crypt($password);
    //$password = $mysqli->real_escape_string($cryptedPassword);
    $sql = "SELECT CustomerID FROM Customer WHERE CustomerEmail = '$email'";
    $result2 = $mysqli->query($sql);
    $customer = $result2->fetch_assoc();
    $customerid=0;
	// if user doesn't exist
    if (!$customer) { 
		die(header("Location: redirect.php"));
    } else{
        $customerid = $customer['CustomerID'];
    }
   $query = "INSERT INTO member (CustomerID,UserID,HashedPassword) VALUES ('$customerid','$userid','$cryptedPassword')";

   if ($mysqli->query($query)) {
        $id = $mysqli->insert_id;
        error_log("Inserted {$email} as ID {$id}");
        return true;
    } else {
        error_log("Problem inserting {$query}");
        return false;
    }
} //end function registerUser

function better_crypt($input, $rounds = 10)
{
    $crypt_options = [
        'cost' => $rounds
    ];
    return password_hash($input, PASSWORD_BCRYPT, $crypt_options);
}
?>