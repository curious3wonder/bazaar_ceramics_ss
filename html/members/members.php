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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="ceramics, pottery, clay, bazaar ceramics, gallery">
	<!--<meta http-equiv="refresh" content="30">-->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>		
	<script type="text/javascript" src= "../../scripts/form_validation.js"></script>
	<script type="text/javascript" src= "../../scripts/img.js"></script>
	<link href="../../css/styles.css" rel="stylesheet" type="text/css" media="screen">
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" media="screen">
	<link href="../../css/laptop.css" rel="stylesheet" type="text/css" media="screen and (min-width: 800px)">
	<link href="../../css/tablet.css" rel="stylesheet" type="text/css" media="screen and (max-width: 800px) and (min-width: 501px)">
	<link href="../../css/mobile.css" rel="stylesheet" type="text/css" media="screen and (max-width: 500px) and (min-width: 50px)">
	<title>Bazaar Ceramics - Members</title>
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
				<li id="list4">
				<a title="Members" class="current" href="members.php">Members</a>
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
<!-- Main page heading section -->
<div id="page-heading">
<h1>Bazaar Ceramics - Members</h1>
</div>
<!-- Sub heading section -->
<div id="sub-heading">
<h2>Members Prices</h2>
</div>
<!-- Content section -->
<div id="content-area2">
<?php
	if (isset($_SESSION['UserID'])) {
	echo "
	<form id='authForm' method='POST' action='logoff.php'>
 		Welcome {$user->CustomerGivenName}
		<input class='button' type='submit' name='submit' value='Log off'>
	</form>
	"; 
	}
?>
<table>
	<tr>
		<th colspan="3" class="th">Discounted Items</th>
	</tr>
	<tr class="tr1">
		<td>
		<a href="members_order.php?title=Copper Red Dish 001&amp;itemDescription=Shallow Copper Red dish form showing distinctive qualities of this traditional reduction fired glaze.  Fired to 1300 degrees&amp;slice=../../images/bcpot009&amp;price=450.00" onclick="thisIsTheWindow = thisWindow(thisFile);" target="new"><img alt="Copper Red Dish 001" src="../../images/bcpot009_smaller.jpg"></a>
		<p>Copper Red Dish 001</p> 
		</td>
		<td>			
		<a href="members_order.php?title=Copper Red Vase 002&amp;itemDescription=Tall Slim Copper Red vase form showing distinctive qualities of this traditional reduction fired glaze. Fired to 1300 degrees.&amp;slice=../../images/bcpot013&amp;price=870.00" onclick="thisIsTheWindow = thisWindow(thisFile);" target="new"><img alt="Copper Red Vase 002" src="../../images/bcpot013_smaller.jpg"></a>
		<p>Copper Red Vase 002</p>
		</td>
		<td>
		<a href="members_order.php?title=Cyan Dish 004&amp;itemDescription=Shallow High Calcium Cyan dish showing a distinctive burnt copper rim. Fired to 1400 degrees.&amp;slice=../../images/bcpot020&amp;price=950.00" onclick="thisIsTheWindow = thisWindow(thisFile);" target="new"><img alt="Cyan Dish 004" src="../../images/bcpot020_smaller.jpg"></a>
		<p>Cyan Dish 004</p>
		</td>
	</tr>
	<tr class="tr2">
		<td>
		<a href="members_order.php?title=Light Blue Cup Set 003&amp;itemDescription=Cup and Saucer set in Light Blue with white trim and a distinctive yellow wheat motif.&amp;slice=../../images/bcpot014&amp;price=106.00" onclick="thisIsTheWindow = thisWindow(thisFile);" target="new"><img alt="Light Blue Cup Set 003" src="../../images/bcpot014_smaller.jpg"></a>
		<p>Light Blue Cup Set 003</p>
		</td>
		<td>
		<a href="members_order.php?title=Tungsten Blue Dish 006&amp;itemDescription=Deep Tungsten Blue dish form showing distinctive qualities of modern firing techniques. Fired to 1650 degrees.&amp;slice=../../images/bcpot012&amp;price=399.00" onclick="thisIsTheWindow = thisWindow(thisFile);" target="new"><img alt="Tungsten Blue Dish 006" src="../../images/bcpot012_smaller.jpg"></a>
		<p>Tungsten Blue Dish 006</p>
		</td>
		<td>
		<a href="members_order.php?title=Earthen Vase 005&amp;itemDescription=Tall Wide Earthen Ware Vase form showing traditional glazing techniques.&amp;slice=../../images/bcpot016&amp;price=999.00" onclick="thisIsTheWindow = thisWindow(thisFile);" target="new"><img alt="Earthen Vase 005" src="../../images/bcpot016_smaller.jpg"></a>
		<p>Earthen Vase 005</p>
		</td>
	</tr>
</table>
			<article>
			<img class="image7" alt="Custom Made Star Dust Bowl" src="../../images/bcpots013.jpg" />
			<img class="image8" alt="Custom Made Star Dust Bowl Small" src="../../images/bcpot013_small.jpg" />
			<img class="image9" alt="Custom Made Star Dust Bowl Smaller" src="../../images/bcpot013_smaller.jpg" />
			</article>


			<article>
			<h3><br>Custom Made</h3>
			<p>The ceramic designers work closely with the gallery director, to ensure that not only is their work unique and contemporary, but is also responsive to the requirements of their clients.  
			</p>
			<a class="btn" title="Order button" href="#">Order Now</a>
			</article>
		</div>
	<!-- #EndEditable -->
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
