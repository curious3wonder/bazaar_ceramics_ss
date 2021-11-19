<?php
require_once("../includes/functions.php");
$user = new User;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta name="description" content="ceramics, pottery, clay, bazaar ceramics, gallery, order">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>		
	<script type="text/javascript" src="../../scripts/logon.js"></script>
	<link href="../../css/register_style.css" rel="stylesheet" type="text/css" media="screen">
	<title>Bazaar Ceramics - Member Logon</title>
</head>
<body>
	<!-- Main wrapper -->
<form id="logonForm" method="POST" action="do_logon.php">
<div>
       <fieldset>
        <legend>Member Logon</legend>
		<div id="errorDiv">
<?php
if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])) {
unset($_SESSION['formAttempt']);
print "Errors encountered<br />\n";
        foreach ($_SESSION['error'] as $error) {
                        print $error . "<br />\n";
        } //end foreach
} //end if
$user->logout();			
?>
		</div>				
		      	<label for="userid">UserID: * </label>
				<input autocomplete="off" type="text" id="userid" name="userid" placeholder="UserID">	
				<span class="errorFeedback errorSpan" id="useridError">User ID is required</span>    <br />
				<label for="password">Password: * </label>
				<input autocomplete="off" type="password" id="password" name="password" placeholder="Password">
				<span class="errorFeedback errorSpan" id="passwordError">Password is required</span>    <br />
		<!-- Footer section -->		
		<div id="footer">
				<input class="button" type="submit" name="submit" value="Logon">
				<input class="button" type="button" name="cancel" value="Cancel" onClick="parent.location='../../index.php'">
				<p>Not a member yet? <a href="new_member.php">Register now</a></p>
		</div>
	</fieldset>
</div>
</form>
	<!-- End wrapper -->
</body>
</html>