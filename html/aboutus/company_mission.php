<?php
require_once('../includes/functions.php');
$user = new User;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="ceramics, pottery, clay, bazaar ceramics, gallery">
	<meta http-equiv="refresh" content="30">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<?php include '../includes/style.inc';?>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" media="screen">
	<link href="../../css/laptop.css" rel="stylesheet" type="text/css" media="screen and (min-width: 800px)">
	<link href="../../css/tablet.css" rel="stylesheet" type="text/css" media="screen and (max-width: 800px) and (min-width: 501px)">
	<link href="../../css/mobile.css" rel="stylesheet" type="text/css" media="screen and (max-width: 500px) and (min-width: 50px)">
	<title>Bazaar Ceramics</title>		
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
		<li id="list2"><a title="About Us" href="company_bg.php" class="dropbtn current">About Us &#9662;</a>
			<ul class="dropdown">
				<li><a title="History" href="company_bg.php">Company Background</a></li>
				<li><a title="Our Artists" href="company_artists.php">Company Artists</a></li>
				<li><a title="Design Process" href="design_process.php">Design Process</a></li>
				<li>
			    <a title="Production Process" href="production_process.php">Production Process</a></li>
				<li>
			    <a title="Our Mission" class="current" href="company_mission.php">Company Mission</a></li>
		    </ul>
	    </li>
		<li id="list3"><a title="Products" href="../products/products.php" >Products</a>
	    </li>
		<li id="list4"><a title="Members" href="../members/members.php">Members</a>
	    </li> 
		<li id="list5"><a title="Events" href="../events/events.php">Events</a></li> 
		<li id="list6">
		  <a title="Customer Support" href="../customer_support/faq.php" class="dropbtn">Customer Support &#9662;</a>
			<ul class="dropdown"> 
				<li><a title="FAQ" href="../customer_support/faq.php">FAQ</a></li>
				<li>
			    <a title="Contact & Location" href="../customer_support/contact_location.php">Contact &#38; Location</a></li>
				<li>
			    <a title="Feedback" href="../customer_support/feedback.php">Feedback</a></li>
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
<?php
	if (isset($_SESSION['UserID'])) {
	echo "
	<form id='authForm' method='POST' action='../members/logoff.php'>
 		Welcome {$user->CustomerGivenName}
		<input class='button' type='submit' name='submit' value='Log off'>
	</form>
	"; 
	}
?>
		  <table>
			  <tr>
				  <td rowspan="3" class="td1"><img class="image15" alt="Design Sketch" src="../../images/bazaar15.jpg" /></td>
				  <td class="td2"><img class="image16" alt="Custom-made Ware" src="../../images/bazaar18.jpg" /></td>
			  </tr>
			  <tr>
				  <td class="td2"><img class="image16" alt="Gallery Display" src="../../images/bazaar14.jpg" /></td>
			  </tr>
			  <tr>
				  <td class="td2"><img class="image16" alt="Ware Production" src="../../images/bazaar16.jpg" /></td>
			  </tr>

		  </table>
		  <h2>Our Mission</h2>			
		  <p>Bazaar Ceramics is committed to producing unique, evocative contemporary Ceramic Art of the highest technical quality.<br><br> <br> 
			  Our Goals:<br><br>
			  •	To produce unique hand crafted pieces for the individual and corporate collector<br><br>
			  •	To showcase the best of Australian Ceramic Art and Design<br><br>
			  •	To provide an extensive range of well crafted and designed domestic ware<br><br>
			  •	To showcase technical excellence in ceramic technology
		  </p>
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
	
	
