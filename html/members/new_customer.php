<?php require_once("../includes/functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta name="description" content="ceramics, pottery, clay, bazaar ceramics, gallery, order">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>		
	<script type="text/javascript" src="../../scripts/new_customer.js"></script>
	<link href="../../css/register_style.css" rel="stylesheet" type="text/css" media="screen">
	<title>Bazaar Ceramics - New Customer Registration</title>
</head>
<body>
	<!-- Main wrapper -->
<form id="userForm" method="POST" action="do_customer.php">
<div>
        <fieldset>
        <legend>New Customer Registration</legend>
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
      			<label for="fname">First name: * </label>
				<input autocomplete="off" type="text" id="fname" name="fname" placeholder="First Name">
				<span class="errorFeedback errorSpan" id="fnameError">First Name is required</span>    <br />
				<label for="lname">Last name: * </label>
				<input autocomplete="off" type="text" id="lname" name="lname" placeholder="Last Name">
				<span class="errorFeedback errorSpan" id="lnameError">Last Name is required</span>    <br />
		      	<label for="email">Email: * </label>
				<input autocomplete="off" type="text" id="email" name="email" placeholder="Email">	
				<span class="errorFeedback errorSpan" id="emailError">Email is required</span>    <br />
				<label for="addr">Address: * </label>
				<input autocomplete="off" type="text" id="addr" name="addr" placeholder="Address">
				<span class="errorFeedback errorSpan" id="addrError">Address is required</span>    <br />
				<label for="suburb">Suburb: * </label>
				<input autocomplete="off" type="text" id="suburb" name="suburb" placeholder="Suburb"> 
				<span class="errorFeedback errorSpan" id="suburbError">Suburb is required</span>    <br />
				<label for="state">State: * </label>
				<input autocomplete="off" type="text" id="state" name="state" placeholder="State">
				<span class="errorFeedback errorSpan" id="stateError">State is required</span>    <br />
				<label for="postcode">Post Code: * </label>
				<input autocomplete="off" type="text" id="postcode" name="postcode" placeholder="Post Code">
				<span class="errorFeedback errorSpan" id="postcodeError">Post Code is required</span>    <br />
				<label for="country">Country: * </label>
				<input autocomplete="off" type="text" id="country" name="country" placeholder="Country">
				<span class="errorFeedback errorSpan" id="countryError">Country is required</span>    <br />
				<label for="phone">Phone Number: * </label>
				<input autocomplete="off" type="text" id="phone" name="phone" placeholder="Phone Number">
				<span class="errorFeedback errorSpan" id="phoneError">Phone Number is required</span>    <br />
		<!-- Footer section -->		
		<div id="footer">
				<input class="button" type="reset" name="reset" value="Reset">
				<input class="button" type="submit" name="submit" value="Register">
				<input class="button" type="button" name="cancel" value="Cancel" onClick="parent.location='../../index.php'">
		</div>
	</fieldset>
</div>
</form>
	<!-- End wrapper -->
</body>
</html>