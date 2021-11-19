<?php
require_once('../../includes/functions.php');
$user = new User;
if (!$user->isLoggedIn) {
        die(header("Location: ../logon.php"));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta name="description" content="ceramics, pottery, clay, bazaar ceramics, gallery, order">
	<link href="../../../css/order_style.css" rel="stylesheet" type="text/css" media="screen">
	<title>Order Complete</title>
</head>
<body>
	<!-- Main wrapper -->
<form id="ordercompleteForm" method="POST" action="do_payment.php">
<div>
	<fieldset>
	<legend>Order Complete</legend>
<?php
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
       	if ($mysqli->connect_errno) {
                error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
                return false;
        }
		$query11 = "SELECT OrderID, OrderDate, CustomerGivenName, CustomerLastName, CustomerAddress, CustomerSuburb,  CustomerState, CustomerPostCode FROM orders INNER JOIN customer USING (CustomerID) WHERE CustomerID = '{$user->CustomerID}'";
		$result11 = $mysqli->query($query11);
		$orderrow = $result11->fetch_row();  
			echo "<table>
			<tr>
			<th>OrderID:</th>
			<td>
			<input type='text' id='orderID' name='orderID' value='".$orderrow[0]."' readonly /></td>
			</tr>";
			echo "<tr>
			<th>Date of the Order:</th>
			<td>
			<input type='text' id='date' name='date' value='".$orderrow[1]."' readonly /></td>
			</td>
			</tr>";	
			echo "<tr>
			<th>Name:</th>
			<td>
			<input type='text' id='custname' name='custname' value='".$orderrow[2]." ".$orderrow[3]."' readonly /></td>
			</td>
			</tr>";
			echo "<tr>
			<th>Address:</th>
			<td>
			<input type='text' id='addr' name='addr' value='".$orderrow[4]."' readonly /></td>
			</td>
			</tr>";
			echo "<tr>
			<th>Suburb:</th>
			<td>
			<input type='text' id='suburb' name='suburb' value='".$orderrow[5]."' readonly /></td>
			</td>
			</tr>";		
			echo "<tr>
			<th>State:</th>
			<td>
			<input type='text' id='state' name='state' value='".$orderrow[6]."' readonly /></td>
			</td>
			</tr>";
			echo "<tr>
			<th>Postcode:</th>
			<td>
			<input type='text' id='postcode' name='postcode' value='".$orderrow[7]."' readonly /></td>
			</td>
			</tr></table><br><br><br>";

		$nwquery = "SELECT ProductTitle, ProductID, ProductDescription, OrderQuantity, ProductPrice, OrderQuantity * ProductPrice as TotalPrice, OrderID FROM orders INNER JOIN orderline USING (OrderID) INNER JOIN product USING (ProductID) WHERE orders.CustomerID = '{$user->CustomerID}'";
		$result4 = $mysqli->query($nwquery);
		$numrow = mysqli_num_rows($result4);
		if ($numrow > 0) {
		echo "
		<table>
			<tr>
				<th>Title</th>	
				<th>Product ID</th>	
				<th>Description</th>	
				<th>Quantity</th>	
				<th>Price</th>	
				<th>Total</th>	
			</tr>
		";	
		$id = 1;
		$totalSum = 0;
		while ($rrow = $result4->fetch_row()) { 
		echo "<tr><td><input class='col1' type='text' id='title".$id."' name='title".$id."' value='".$rrow[0]."' readonly /></td>";
		echo "<td><input class='col2' type='text' id='productID".$id."' name='productID".$id."' value='".$rrow[1]."' readonly /></td>";
		echo "<td><input class='col3' type='text' id='description".$id."' name='description".$id."' value='".$rrow[2]."' readonly /></td>";
		echo "<td><input class='col4' type='number' id='quantity".$id."' name='quantity".$id."' value='".$rrow[3]."' readonly /></td>";
		echo "<td><input class='col5' type='number' id='unitPrice".$id."' name='unitPrice".$id."' value='".$rrow[4]."' readonly /></td>";
		echo "<td><input class='col6' type='number' id='totalPrice".$id."' name='totalPrice".$id."' value='".$rrow[5]."' readonly /></td>";
		echo "<td style='display: none;'><input class='col6' type='number' id='orderID".$id."' name='orderID".$id."' value='".$rrow[6]."' readonly /></td>";
		$id++; 
		$totalSum = $totalSum + ($rrow[3] * $rrow[4]);
		$totalSumIn = sprintf('%.2f', $totalSum);
		} // end while 
		echo "
			<tr><td colspan='3'></td><td colspan='2' style='font-weight: bold; text-align: right;'>Total Price</td><td><input class='col6' type='number' id='totalSum' name='totalSum' value='".$totalSumIn."' readonly /></td></tr>
		</table>
		";	
		} // end if 
?>
	<!-- Footer section -->
		<div id="footer">
				<a href ="do_payment.php" class='button' type='submit' name='payment' onClick='self.close()'>PAY NOW</a>
		</div>
	</fieldset>
</div>
</form>
	<!-- End wrapper -->
</body>
</html>