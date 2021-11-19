<?php
require_once('../includes/functions.php');
//prevent access if they haven't submitted the form.
if (!isset($_POST['submit'])) {
    die(header("Location: new_customer.php"));
}
$_SESSION['formAttempt'] = true;
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
$_SESSION['error'] = array();
$required = array("fname","lname","email","addr","suburb", "state", "postcode", "country", "phone");
//Check required fields
foreach ($required as $requiredField) {
if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
        $_SESSION['error'][] = $requiredField . " is required";
    }
}
if (!preg_match('/^[\w .]+$/',$_POST['fname'])) {
    $_SESSION['error'][] = "First Name must be letters and numbers only";
}
if (!preg_match('/^[\w .]+$/',$_POST['lname'])) {
    $_SESSION['error'][] = "Last Name must be letters and numbers only";
}

if (isset($_POST['phone']) && $_POST['phone'] != "") {
    if (!preg_match('/^[\d]+$/',$_POST['phone'])) {
        $_SESSION['error'][] = "Phone number should be digits only with no space";
    } else if (strlen($_POST['phone']) < 10) {
        $_SESSION['error'][] = "Phone number must be at least 10 digits";
    }
}
if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'][] = "Invalid E-mail address";
}
//final disposition
if (count($_SESSION['error']) > 0) {
    die(header("Location: new_customer.php"));
} else {
    if(registerUser($_POST)) {
        unset($_SESSION['formAttempt']);
        die(header("Location: customer_success.php"));
    } else {
error_log("Problem registering user: {$_POST['fname']} {$_POST['lname']}");
       $_SESSION['error'][] = "Problem registering account";
        die(header("Location: new_customer.php"));
    }
}
function registerUser($userData) {
    $mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
    if ($mysqli->connect_errno) {
error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
        return false;
    }
    $fname = $mysqli->real_escape_string($_POST['fname']);
    $lname = $mysqli->real_escape_string($_POST['lname']);
    $email = $mysqli->real_escape_string($_POST['email']);
	$addr = $mysqli->real_escape_string($_POST['addr']);
    $suburb = $mysqli->real_escape_string($_POST['suburb']);
    $state = $mysqli->real_escape_string($_POST['state']);
    $postcode = $mysqli->real_escape_string($_POST['postcode']);
    $country = $mysqli->real_escape_string($_POST['country']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $query = "INSERT INTO customer (CustomerGivenName,CustomerLastName,CustomerEmail,CustomerAddress,
CustomerSuburb,CustomerState,CustomerPostCode,CustomerCountry,CustomerPhoneNumber) 
   VALUES ('$fname','$lname','$email','$addr','$suburb','$state','$postcode','$country','$phone')";
    if ($mysqli->query($query)) {
        $id = $mysqli->insert_id;
        error_log("Inserted {$email} as ID {$id}");
        return true;
    } else {
        error_log("Problem inserting {$query}");
        return false;
    }
} //end function registerUser
?> 