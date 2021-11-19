<?php
require_once('../includes/functions.php');
$user = new User;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Bazaar Ceramics</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="ceramics, pottery, clay, bazaar ceramics, gallery">
	<meta http-equiv="refresh" content="5">
	<?php include '../includes/style.inc';?>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" media="screen">
	<link href="../../css/laptop.css" rel="stylesheet" type="text/css" media="screen and (min-width: 800px)">
	<link href="../../css/tablet.css" rel="stylesheet" type="text/css" media="screen and (max-width: 800px) and (min-width: 501px)">
	<link href="../../css/mobile.css" rel="stylesheet" type="text/css" media="screen and (max-width: 500px) and (min-width: 50px)">

	<script   			
			src="https://code.jquery.com/jquery-3.5.1.min.js"   >
		</script>
		
</head>

<body>
<!-- Main wrapper -->
	<div id = "wrapper">
	<!-- Page banner -->
	  <div id = "banner">
		<?php include '../includes/banner.inc';?>
	  </div>
	<!-- Navigation section -->
	  <div id = "navigation">
<ul>
		<li id="list1"><a title="Home" href="../../index.php">Home</a></li>
		<li id="list2"><a title="About Us" href="../aboutus/company_bg.php" class="dropbtn">About Us &#9662;</a>
			<ul class="dropdown">
				<li><a title="History" href="../aboutus/company_bg.php">Company Background</a></li>
				<li><a title="Our Artists" href="../aboutus/company_artists.php">Company Artists</a></li>
				<li><a title="Design Process" href="../aboutus/design_process.php">Design Process</a></li>
				<li><a title="Production Process" href="../aboutus/production_process.php">Production Process</a></li>
				<li><a title="Our Mission" href="../aboutus/company_mission.php">Company Mission</a></li>
		    </ul>
	    </li>
		<li id="list3">
		  <a title="Products" href="../products/products.php" >Products</a>
	    </li>
		<li id="list4"><a title="Members" href="../members/members.php">Members</a>
	    </li> 
		<li id="list5">
	    <a title="Events" class="current" href="events.php">Events</a></li> 
		<li id="list6"><a title="Customer Support" href="../customer_support/faq.php" class="dropbtn">Customer Support &#9662;</a>
			<ul class="dropdown"> 
				<li><a title="FAQ" href="../customer_support/faq.php">FAQ</a></li>
				<li><a title="Contact & Location" href="../customer_support/contact_location.php">Contact &#38; Location</a></li>
				<li><a title="Feedback" href="../customer_support/feedback.php">Feedback</a></li>
		    </ul>
	    </li> 
	  </ul>
		    <div id = "social-media">
			  <?php include '../includes/social_media.inc';?>
			  </div>
	  </div>
	<!-- Header section -->	
	  <div id = "header">
		  <?php include '../includes/header.inc';?>
	  </div>
	<!-- Content section -->
	  <div id="content-area">
		  <h2>Under Construction</h2>
	  </div>

	<!-- Bottom-bar section -->	
		<div id= "bottom-bar">
			<?php include '../includes/bottom_bar.inc';?>
	    </div>
	<!-- Footer section -->	
		<div id= "footer">
			<?php include '../includes/footer.inc';?>
	    </div>
	<!-- End wrapper -->
	  <script>				
			$('.dropbtn').click(function(){
				$('.dropdown').toggleClass('display');
			})
		</script>	
		
     </div>
	</body>
</html>
	
	
