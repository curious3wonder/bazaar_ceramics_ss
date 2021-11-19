<?php
require_once('../includes/functions.php');
$user = new User;
$user->logout();
die(header("Location: logoff_success.php"));
?>