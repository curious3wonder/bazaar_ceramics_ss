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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"   ></script>
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
		<li id="list2">
		  <a title="About Us" href="company_bg.php" class="dropbtn current">About Us &#9662;</a>
			<ul class="dropdown">
				<li>
			    <a title="History" class="current" href="company_bg.php">Company Background</a></li>
				<li><a title="Our Artists" href="company_artists.php">Company Artists</a></li>
				<li><a title="Design Process" href="design_process.php">Design Process</a></li>
				<li><a title="Production Process" href="production_process.php">Production Process</a></li>
				<li><a title="Our Mission" href="company_mission.php">Company Mission</a></li>
		    </ul>
	    </li>
		<li id="list3"><a title="Products" href="../products/products.php" >Products</a>
	    </li>
		<li id="list4"><a title="Members" href="../members/members.php">Members</a>
	    </li> 
		<li id="list5"><a title="Events" href="../events/events.php">Events</a></li> 
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
				  <td rowspan="2" class="td1"><img class="image15" alt="Bazaar Building" src="../../images/bazaar_building.jpg" /></td>
				  <td class="td2"><img class="image16" alt="Bazaar Gallery" src="../../images/bazaar_gallery.jpg" /></td>
			  </tr>
			  <tr>
				  <td class="td2"><img class="image16" alt="Finishing Clay" src="../../images/finishing2.jpg" /></td>
			  </tr>
		  </table>
		    <h2>History</h2>
			<p>Bazaar Ceramics Studio has been operating for 20 years.  We started as a small collective, operating in the picturesque township of Hahndorf, South Australia - known for its quality arts and crafts.  Over the years the studio has passed through a number of transformations.  In the first 7 years of its existence - as a co-operative, it was well known for producing quality domestic ware and fine individually designed art pieces.<br><br> 
			Each member of the co-operative was responsible for designing, throwing, glazing and firing their own work.  A gallery director was employed to look after the gallery and all aspects of marketing. <br><br>
			As the reputation of the studio grew nationally, and production expanded to meet demand, the structure of the business changed to its present form.  Emma Rich bought the business and moved into larger premises in Stepney, Adelaide. <br><br>
			Bazaar Ceramics has a wide range of products to meet the needs of clients both nationally and internationally.  The studio produces exquisite one off sculptural pieces for the individual and corporate collector.  Commissions make up approximately 40% of this work.  These pieces can be found in board rooms, international hotels and private homes as far away as the US and Germany. <br><br>
			Bazaar Ceramics also produce unique, individually designed domestic ware, including full dinner sets and ovenware.
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
	
	
