<?php
echo "
<ul>
	<li class='search'><input type='text'placeholder='Search..' name='search'></li>
  	<li>
		<a href='../members/cart/cart.php'><img alt='cart' src='../../images/cart.png' />";
$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
$qtyquery = "SELECT OrderQuantity FROM orders INNER JOIN orderline USING (OrderID) WHERE orders.CustomerID = '{$user->CustomerID}'";
$qtyresult = $mysqli->query($qtyquery);
$totalQty = 0;
while($low = $qtyresult->fetch_assoc()) { 
	$orderQty = $low['OrderQuantity'];
	$totalQty += $orderQty;
}
echo "<p>({$totalQty})Items in Cart</p>";
echo "		
		</a>
  	</li>
	<li><a href='../members/logon.php'><img alt='account' src='../../images/account.png'/></a></li>
</ul>
";
?>
