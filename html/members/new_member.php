<?php require_once("../includes/functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta name="description" content="ceramics, pottery, clay, bazaar ceramics, gallery, order">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>		
	<script type="text/javascript" src="../../scripts/new_member.js"></script>
	<link href="../../css/register_style.css" rel="stylesheet" type="text/css" media="screen">
	<title>Bazaar Ceramics - New Member Registration</title></head>
<body>
	<!-- Main wrapper -->
<form id="memberForm" method="POST" action="do_member.php">
<div>
        <fieldset>
        <legend>New Member Registration</legend>
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
		      	<label for="email">Email: * </label>
				<input autocomplete="off" type="text" id="email" name="email" placeholder="Email">	
				<span class="errorFeedback errorSpan" id="emailError">Email is required</span>    <br />
				<label for="userid">UserID: * </label>
				<input autocomplete="off" type="text" id="userid" name="userid" placeholder="UserID">	
				<span class="errorFeedback errorSpan" id="useridError">User ID is required</span>    <br />
				<label for="password1">Password: * </label>
				<input autocomplete="off" type="password" id="password1" name="password1" placeholder="Password">
				<span class="errorFeedback errorSpan" id="password1Error">Password is required</span>    <br />
				<label for="password2">Verify Password: * </label>
        		<input autocomplete="off" type="password" id="password2" name="password2" placeholder="Password">
        		<span class="errorFeedback errorSpan" id="password2Error">Passwords don't match</span>	<br />
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