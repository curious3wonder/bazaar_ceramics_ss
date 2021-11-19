<?php
session_start();
require_once("html/includes/dbstuff.inc");
require_once("html/includes/ClassUser.php");
$user = new User;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="ceramics, pottery, clay, bazaar ceramics, gallery">
	<!--<meta http-equiv="refresh" content="30">-->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<?php include 'html/includes/style.inc';?>
	<link href="css/layout.css" rel="stylesheet" type="text/css" media="screen">
	<link href="css/laptop.css" rel="stylesheet" type="text/css" media="screen and (min-width: 800px)">
	<link href="css/tablet.css" rel="stylesheet" type="text/css" media="screen and (max-width: 800px) and (min-width: 501px)">
	<link href="css/mobile.css" rel="stylesheet" type="text/css" media="screen and (max-width: 500px) and (min-width: 50px)">
	<title>Bazaar Ceramics</title>
</head>

<body>
<!-- Main wrapper -->
	<div id = "wrapper">
	<!-- Page banner -->
	  <div id = "banner">
		  <a title="Bazaar Ceramics Banner" href="index.php"> 
		  <img class="responsive" alt="banner" src="images/banner.jpg" /> 
		  </a> 
			  <div id = "logo"> 
				  <a title="Bazaar Ceramics Logo" href="index.php"> 
					  <img class="responsive" alt="logo" src="images/bazaar-logo.jpg" /> 
				  </a> 
			  </div>;'
	  </div>
	<!-- Navigation section -->
	  <div id = "navigation">
<ul>
		<li id="list1"><a title="Home" class="current" href="index.php">Home</a></li>
		<li id="list2">
		  <a title="About Us" href="html/aboutus/company_bg.php" class="dropbtn">About Us &#9662;</a>
			<ul class="dropdown">
				<li>
			    <a title="History" href="html/aboutus/company_bg.php">Company Background</a></li>
				<li>
			    <a title="Our Artists" href="html/aboutus/company_artists.php">Company Artists</a></li>
				<li>
			    <a title="Design Process" href="html/aboutus/design_process.php">Design Process</a></li>
				<li>
			    <a title="Production Process" href="html/aboutus/production_process.php">Production Process</a></li>
				<li>
			    <a title="Our Mission" href="html/aboutus/company_mission.php">Company Mission</a></li>
		    </ul>
	    </li>
		<li id="list3">
		  <a title="Products" href="html/products/products.php" >Products</a>
	    </li>
		<li id="list4">
		  <a title="Members" href="html/members/members.php">Members</a>
	    </li> 
		<li id="list5"><a title="Events" href="html/events/events.php">Events</a></li> 
		<li id="list6">
		  <a title="Customer Support" href="html/customer_support/faq.php" class="dropbtn">Customer Support &#9662;</a>
			<ul class="dropdown"> 
				<li><a title="FAQ" href="html/customer_support/faq.php">FAQ</a></li>
				<li>
			    <a title="Contact & Location" href="html/customer_support/contact_location.php">Contact &#38; Location</a></li>
				<li>
			    <a title="Feedback" href="html/customer_support/feedback.php">Feedback</a></li>
		    </ul>
	    </li> 
	  </ul>
		  
		    <div id = "social-media">
		      <p>Find Us On</p>
				  <ul>
					  <li><img alt="facebook" src="images/facebook.png" /></li>
					  <li><img alt="instagram" src="images/instagram.png" /></li>
					  <li><img alt="pinterest" src="images/pinterest.png" /></li>
				  </ul>
			  </div>
	  </div>
	<!-- Header section -->	
	  <div id = "header">	  
<?php
echo "
<ul>
	<li class='search'><input type='text'placeholder='Search..' name='search'></li>
  	<li>
		<a href='html/members/cart/cart.php'><img alt='cart' src='images/cart.png' />";
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
	<li><a href='html/members/logon.php'><img alt='account' src='images/account.png'/></a></li>
</ul>
";
?>
	  </div>
	<!-- Content section -->
	  <div id="content-area">
<?php
	if (isset($_SESSION['UserID'])) {
	echo "
	<form id='authForm' method='POST' action='html/members/logoff.php'>
 		Welcome {$user->CustomerGivenName}
		<input class='button' type='submit' name='submit' value='Log off'>
	</form>
	"; 
	}
?>
		  <article>
			<table>
				<tr>
					<td rowspan="3" class="td1">
						<img class="image1" alt="Brown Bowl" src="images/bcpot002.jpg" />
						<img class="image2" alt="Brown Bowl Small" src="images/bcpot002_small.jpg" />
						<img class="image3" alt="Brown Bowl Smaller" src="images/bcpot002_smaller.jpg" />
					</td>
					<td class="td2">
						<img class="image4" alt="Sunny Bowl" src="images/bcpot009.jpg" />
						<img class="image5" alt="Sunny Bowl Small" src="images/bcpot009_small.jpg" />
						<img class="image6" alt="Sunny Bowl Smaller" src="images/bcpot009_smaller.jpg" />
					</td>
				</tr>
				<tr>
					<td class="td2">
						<img class="image4" alt="Cloud Bowl" src="images/bcpot006.jpg" />
						<img class="image5" alt="Cloud Bowl Small" src="images/bcpot006_small.jpg" />
						<img class="image6" alt="Cloud Bowl Smaller" src="images/bcpot006_smaller.jpg" />
					</td>
				</tr>
				<tr>
					<td class="td2">
						<img class="image4" alt="Opera Bowl" src="images/bcpot008.jpg" />
						<img class="image5" alt="Opera Bowl Small" src="images/bcpot008_small.jpg" />
						<img class="image6" alt="Opera Bowl Smaller" src="images/bcpot008_smaller.jpg" />
					</td>
				</tr>
			</table>
			<h2>Our Mission</h2>
			<p>Bazaar Ceramics is committed to producing unique, evocative contemporary Ceramic Art of the highest technical quality. <br> 
				Our Goals:<br>
				•	To produce unique hand crafted pieces for the individual and corporate collector<br>
				•	To showcase the best of Australian Ceramic Art and Design<br>
				•	To provide an extensive range of well crafted and designed domestic ware<br>
				•	To showcase technical excellence in ceramic technology
			</p>
		  </article>
		  <article>
			<img class="image7" alt="Custom Made Star Dust Bowl" src="images/bcpots013.jpg" />
			<img class="image8" alt="Custom Made Star Dust Bowl Small" src="images/bcpot013_small.jpg" />
			<img class="image9" alt="Custom Made Star Dust Bowl Smaller" src="images/bcpot013_smaller.jpg" />
		  </article>
			
		  <article>
			<h3><br>Custom Made</h3>
			<p>The ceramic designers work closely with the gallery director, to ensure that not only is their work unique and contemporary, but is also responsive to the requirements of their clients.  
			</p>
			<a class="btn" title="Order button" href="#">Order Now</a>
		  </article>
	  </div>
	<!-- Bottom-bar section -->	
		<div id= "bottom-bar">
			<div id= "we-accept">
				<h2><br>We Accept</h2>
				<ul>
					<li><img class="image10" alt="visa" src="images/Visa.png" /></li>
					<li><img class="image10" alt="paypal" src="images/Paypal.png" /></li>
					<li><img class="image10" alt="mastercard" src="images/MasterCard.png" /></li>
					<li><img class="image10" alt="stripe" src="images/stripe.png" /></li>
					<li><img class="image10" alt="jcb" src="images/jcb.png" /></li>
					<li><img class="image10" alt="discover" src="images/discover.png" /></li>
			    </ul>
				</div>
			<div id= "sign-up">
				<img alt="newsletter" src="images/newsletter.png" />
				<h2>Sign Up For Our Newsletter</h2>
				<table class="email">
					<tr>
						<th>Your Email Address</th>
						<td>Join</td>
				    </tr>
			    </table>
		    </div>
	    </div>
	<!-- Footer section -->	
		<div id= "footer">
			<br>&copy; Bazaar Ceramics
			<div class="content">
				<a title="Copyright" href="#">Copyright</a> 
				<a title="About Us" href="#">About Us</a> 
				<a title="Legal" href="#">Legal</a> 
				<a title="Site Map" href="#">Site Map</a> 
		    </div>
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