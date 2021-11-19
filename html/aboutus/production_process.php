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
	<script type="text/javascript" src= "../../scripts/slideshow.js"></script>
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
			    <a title="Production Process" class="current" href="production_process.php">Production Process</a></li>
				<li><a title="Our Mission" href="company_mission.php">Company Mission</a></li>
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
		  <div class="row">
				  <img class="image11" src="../../images/slideshow/openingclay.jpg" alt="Opening Clay" onclick="myFunction(this);">
				  <img class="image11" src="../../images/slideshow/sequence1.jpg" alt="Sequence 1" onclick="myFunction(this);">
				  <img class="image11" src="../../images/slideshow/sequence8.jpg" alt="Sequence 2" onclick="myFunction(this);">
				  <img class="image11" src="../../images/slideshow/sequence12.jpg" alt="Sequence 3" onclick="myFunction(this);">
				  <img class="image11" src="../../images/slideshow/finishing.jpg" alt="Finishing" onclick="myFunction(this);">

			<!-- The expanding image container -->
			  <div class="container">
				  <!-- Close the image -->
				  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
	
				  <!-- Expanded image -->
				  <img class="image12" id="expandedImg" alt="expandedImage">

				  <!-- Image text -->
				  <div id="imgtext">
				  </div>
			  </div>
				
			  <div id="content-area3">
				<p> Bazaar Ceramics are constantly experimenting with new designs and techniques.  The process of developing a particular range of ceramics, starts with the design process.  The ceramic designers and gallery director meet regularly to discuss new ideas for product ranges.  It may be that the designers are following through on an inspiration from a field trip or perhaps the gallery director has some suggestions to make based on feedback from customers.<br><br>
				Promising designs are developed into working drawings which the production potters use to create the ceramic forms.  Depending on the type of decoration, the designers may apply the decoration at this stage, or after they have been “bisqued” (fired to 1000 degrees celsius).  These prototype designs go through a lengthy development stage of testing and review until the designer is happy with the finished product.  At this stage a limited number of pots are produced and displayed in the gallery.  If they do well in the gallery, they become a “standard line”.
				</p>
			  </div>
				
		  </div>
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
	
	
