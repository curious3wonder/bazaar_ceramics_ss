<?php
require_once('../includes/functions.php');
$user = new User;
if (!$user->isLoggedIn) {
        die(header("Location: logon.php"));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta name="description" content="ceramics, pottery, clay, bazaar ceramics, gallery, order">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>	
	<script type="text/javascript" src= "../../scripts/form_validation.js"></script>
	<script type="text/javascript" src= "../../scripts/img.js"></script>
	<script type="text/javascript" src= "../../scripts/new_order.js"></script>
	<link href="../../css/m_order_style.css" rel="stylesheet" type="text/css" media="screen">
	<title>Bazaar Ceramics - Members Order</title>
</head>

<body onLoad = "setPageValues();">
	<!-- Main Wrapper -->
	<div id="wrapper">
		<!-- Page Header -->
		<div id="header">
			<h1 id = "theHeading">&nbsp;  </h1>	
		</div>
		<!-- Image Content -->
		<div id="image-content">
			<script>buildImageSlices(imgSlice);</script>
		</div>
		<!-- Form Content -->
		
	<form id="thisForm" name="thisForm" action="cart/do_cart.php" method="post"> 
		<div id="form-content">
			<fieldset>
		<div id="errorDiv">
<?php
        if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])) {
        	unset($_SESSION['formAttempt']);
        	print "Errors encountered<br />\n";
                foreach ($_SESSION['error'] as $error) {
                                print $error . "<br />\n";
                } //end foreach
        } //end if
?>
		</div>				
				<label for="title">Title</label>
				<input type="text" maxlength="50" name="title" id="title" value="" readonly /><br>
				
				<label class = description for="item description">Item Description</label>
				<textarea style="width: 400px;" id="itemDescription" name="itemDescription" rows="2" cols="50" readonly >
				</textarea><br>

				<label for="quantity">Quantity</label>
				<input type="number" name="quantity" id="quantity" value="1"/>
				<span class="errorFeedback errorSpan" id="quantity1Error">Quantity must be greater than zero</span>
				<span class="errorFeedback errorSpan" id="quantity2Error">Quantity is required</span>    <br>

				<label for="price">Price</label>
				<input type="number" name="price" id="price" min="0.01" max="3000" value="" readonly />    <br>
				
				<label for="totalPrice">Total Price</label>
				<input type="number" name="totalPrice" id="totalPrice" min="0.01" max="300000" value="" readonly />
			
			<div id='buttonbar'>
				<input class='button' type="reset" name="clear" id="clear" value="Clear" onClick="clearResults();"/>
				<input class='button' type="button" name="calculateTotal" id="calculateTotal" value="Calculate Total" onClick="checkOrder(document.getElementById('quantity').value); "/>
				<input class='button' type="submit" name="submit" id="submit" value="Add to Cart" onClick="checkOrder(document.getElementById('quantity').value); return confirmOrder(thisForm); return cancelOrder(thisForm);" />
			</div>
			</fieldset>
		</div>
	</form>
		<!-- Footer section -->
		<div id="footer">
			<input class='button' type="button" value="Close" onclick="self.close()">
		</div>
	<!-- End wrapper -->
	</div>
</body>
</html>
