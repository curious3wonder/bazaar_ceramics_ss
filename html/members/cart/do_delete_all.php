<?php
require_once("../../includes/functions.php");
	$user = new User;

	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
       if ($mysqli->connect_errno) {
               error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
               return false;
       }
	$nwquery = "SELECT ProductID, ProductDescription, OrderQuantity, ProductPrice, OrderQuantity * ProductPrice as TotalPrice, OrderID FROM orders INNER JOIN orderline USING (OrderID) INNER JOIN product USING (ProductID) WHERE orders.CustomerID = '{$user->CustomerID}'";
	$result4 = $mysqli->query($nwquery);
	$rrow = $result4->fetch_assoc();
	$update3 = "DELETE FROM orderline WHERE OrderID = {$rrow['OrderID']}";
	$update4 = "DELETE FROM orders WHERE OrderID = {$rrow['OrderID']}";
	if ($mysqli->query($update3)) {
		error_log("Deleted 'update3' successfully");
        if ($mysqli->query($update4)) {
		error_log("Deleted 'update4' successfully");
        die(header("Location: cart.php"));
		} else {
        error_log("Problem with {$update4}");
        return false;
		}
    } else {
        error_log("Problem with {$update3}");
        return false;
    }

?>