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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>	
	<script type="text/javascript" src= "../../../scripts/cart.js"></script>
	<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
	</script>
	<link href="../../../css/cart_style.css" rel="stylesheet" type="text/css" media="screen">
	<title>Items in Cart</title></head>
<body>
	<!-- Main wrapper -->
<form id="cartForm" method="POST" action="cart_order.php" target="new">
	<div id="form-content">
        <fieldset>
        <legend>Your Shopping Cart</legend>
<?php
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
       	if ($mysqli->connect_errno) {
                error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
                return false;
        }
		$nwquery = "SELECT ProductTitle, ProductID, ProductDescription, OrderQuantity, ProductPrice, OrderQuantity * ProductPrice as TotalPrice, OrderID FROM orders INNER JOIN orderline USING (OrderID) INNER JOIN product USING (ProductID) WHERE orders.CustomerID = '{$user->CustomerID}'";
		$result4 = $mysqli->query($nwquery);
		$numrow = mysqli_num_rows($result4);
		if ($numrow > 0) {{
		echo "
		<table>
			<tr>
				<th>Title</th>	
				<th>Product ID</th>	
				<th>Description</th>	
				<th>Quantity</th>	
				<th>Price</th>	
				<th>Total</th>	
				<th>Remove</th>	
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
		echo "<td><input class='button' type='button' name='cancel".$id."' value='Delete Item".$id."' onClick='deleteItem(".$id.");' /></td></tr>";
		$id++; 
		$totalSum = $totalSum + ($rrow[3] * $rrow[4]);
		$totalSumIn = sprintf('%.2f', $totalSum);
		} // end while 
		echo "
			<tr><td colspan='3'></td><td colspan='2' style='font-weight: bold; text-align: right;'>Total Price</td><td><input class='col6' type='number' id='totalSum' name='totalSum' value='".$totalSumIn."' readonly /></td></tr>
		";	
		} // end if 
		echo "
			</table>
			<div id='footer'>
				<a href = '../members.php' class='button' type='button' name='Close' onClick='self.close()'>Close</a>
				<a href = 'do_delete_all.php' class='button' type='button' name='deleteall'>Delete Cart</a>
				<a href = 'cart_order.php' class='button' type='submit' name='confirm'>Confirm Order</a>
			</div>
		";	
		}	else{
		echo "<p>There are no items in the cart.</p>";	
		echo "<a href='../members.php' style='text-align:center; display:block;'>Start shopping</a>";
		} // end else				
?>
		</fieldset>
</div>
</form>
	<!-- End wrapper -->
</body>
</html>