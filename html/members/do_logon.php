<?php
require_once('../includes/functions.php');
//prevent access if they haven't submitted the form.
if (!isset($_POST['submit'])) {
    die(header("Location: logon.php"));
}
$_SESSION['formAttempt'] = true;
if (isset($_SESSION['error'])) {
   	unset($_SESSION['error']);
}
$_SESSION['error'] = array();
$required = array("userid","password");
//Check required fields
foreach ($required as $requiredField) {
if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
        $_SESSION['error'][] = $requiredField . " is required";
    }
}
//final disposition
if (count($_SESSION['error']) > 0) {
        die(header("Location: logon.php"));
} else {
        $user = new User;
if ($user->authenticate($_POST['userid'],$_POST['password'])) {
        unset($_SESSION['formAttempt']);
                die(header("Location: members.php"));
        } else {
                $_SESSION['error'][] = "There was a problem with your UserID or password.";
                die(header("Location: logon.php"));
        }
}
?>