<?php
require_once("../../includes/functions.php");

	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
       if ($mysqli->connect_errno) {
               error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
               return false;
       }
	$thisOrderID = $_GET['orderid'];
	$thisProductID =  $_GET['productid'];
	$update = "DELETE FROM orderline WHERE ProductID = '".$thisProductID."' AND OrderID = '".$thisOrderID."'";
	if ($mysqli->query($update)) {
        error_log("Deleted successfully");
        die(header("Location: cart.php"));
    } else {
        error_log("Problem with {$update}");
        return false;
    }
?>