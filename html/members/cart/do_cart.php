<?php
require_once('../../includes/functions.php');
$user = new User;
if (!$user->isLoggedIn) {
        die(header("Location: logon.php"));
}
//prevent access if they haven't submitted the form.
if (!isset($_POST['submit'])) {
    die(header("Location: ../members.php"));
}
$_SESSION['formAttempt'] = true;
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
$_SESSION['error'] = array();
$required = array("quantity","price");
//Check required fields
foreach ($required as $requiredField) {
if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
        $_SESSION['error'][] = $requiredField . " is required";
    }
}
if (!preg_match('/^[\d]+$/',$_POST['quantity'])) {
    $_SESSION['error'][] = "Quantity must be numeric";
} else if (strlen($_POST['quantity']) <= 0) {
    $_SESSION['error'][] = "Quantity must be greater than zero";
}

//final disposition
if (count($_SESSION['error']) > 0) {
    die(header("Location: ../members.php"));
} else {
    if(getItem($_POST)) {
        unset($_SESSION['formAttempt']);
        die(header("Location: cart.php"));
    } else {
		error_log("Problem getting item {$_POST['title']}");
       	$_SESSION['error'][] = "Problem getting item";
        die(header("Location: ../members.php"));
    }
}
function getItem($itemData) {
    $mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
    if ($mysqli->connect_errno) {
error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
        return false;
    }
	$user = new User;
	$customerid = $user->CustomerID;

	$idsql = "SELECT OrderID FROM orders WHERE CustomerID = '$customerid' AND OrderDate = CURDATE()";
	$idresult2 = $mysqli->query($idsql);
	$order = $idresult2->fetch_assoc();
	$orderid=0;
	// if order exists
	if ($order) { 
		$orderid = $order['OrderID'];
	} else {
    	$orderquery = "INSERT INTO orders (CustomerID,OrderDate) VALUES ('$customerid',CURDATE())";
		if ($mysqli->query($orderquery)) {
    		$orderid = $mysqli->insert_id;
    		error_log("Generated OrderID {$orderid} successfully");
    	} else {
    	    error_log("Problem inserting {$orderquery}");
    	    return false;
    	}
	}
		
	$title = $mysqli->real_escape_string($_POST['title']);
	$titlesql = "SELECT ProductID FROM product WHERE ProductTitle = '$title'";
    $titleresult = $mysqli->query($titlesql);
    $product = $titleresult->fetch_assoc();
    $productid = $product['ProductID'];
    $quantity = $mysqli->real_escape_string($_POST['quantity']);
	
	// check if orderline exists
	$linesql = "SELECT OrderQuantity FROM orderline WHERE OrderID = '$orderid' AND ProductID = '$productid'";
	$lineresult2 = $mysqli->query($linesql);
	$line = $lineresult2->fetch_assoc();
	if ($line) {

    	$orderQuantity = $line['OrderQuantity'];

		$itemquery = "UPDATE orderline SET OrderQuantity = ($orderQuantity+$quantity) WHERE OrderID = '$orderid' AND ProductID = '$productid'"; 
		if ($mysqli->query($itemquery)) {
        error_log("Inserted {$itemquery} successfully");
        return true;
   		} else {
   		    error_log("Problem inserting {$itemquery}");
   		    return false;
   		}
	
	} else {
    $item2query = "INSERT INTO orderline (OrderID, ProductID, OrderQuantity) VALUES ('$orderid','$productid','$quantity')";
    	if ($mysqli->query($item2query)) {
    	    error_log("Inserted {$item2query} successfully");
    	    return true;
    	} else {
    	    error_log("Problem inserting {$item2query}");
    	    return false;
    	}
	}		
} //end function getItem
?> 