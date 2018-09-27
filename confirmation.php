<?php
$stripeToken = ltrim(rtrim(filter_input(INPUT_POST, "stripeToken", FILTER_SANITIZE_STRING)));
if (empty($stripeToken))
{
    header("location: index.php"); // deal with invalid input
    exit();
}

$name = $_POST['name'];
$address = $_POST['address'];
$birth = $_POST['birth'];




require_once 'configuration.php';
require_once 'header.php';
// make stripe payment
require_once('./Stripe/init.php');
\Stripe\Stripe::setApiKey($privateStripeKey);

?>


<html>
<head>
<title>Luxury Watches</title>
        <link href="style/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
        <script src="js/jquery-1.11.0.min.js"></script>
        <!--Custom-Theme-files-->
        <!--theme-style-->
        <link href="style/style_1.css" rel="stylesheet" type="text/css" media="all" />	
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--start-menu-->
        <script src="js/simpleCart.min.js"></script>
        <link href="style/memenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="js/memenu.js"></script>
        <script>$(document).ready(function ()
{
    $(".memenu").memenu();
});</script>
</head>
<body> 
	<!--top-header-->
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
		</div>
	</div>
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
                                        <li><a href="checkOut.php">Checkout</a></li>
                                        <li><a href="checkOut.php">Pay</a></li>
                                        <li class="active">Confirmation</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
        <div class="ckeckout">
            <div class="container" style="text-align: center;">
			<div class="ckeck-top heading">
				<h2>Confirmation</h2>
                                <br>
                                <p>Thank you for your purchase. You can find details about your purchase below.</p>
                                <div class="logo" style="display: inline-block">
                                    <a><h2 style="color: black; font-size: 15px;">Personal Details</h2></a><br>
                                    <a><h1 style="color: black; font-size: 15px;">Name: <?php echo $name; ?></h1></a><br>
            <a><h1 style="color: black; font-size: 15px;">Address: <?php echo $address; ?></h1></a><br>
            <a><h1 style="color: black; font-size: 15px;">DOB: <?php echo $birth; ?></h1></a><br><br>
             <?php
            $total=0; // define total so the script won't throw silly error of a type 'Undefined variable: total in....'
            /* Loops through item session array and display data */
            
            foreach($_SESSION["items"] as $item){ 			
            ?>
                    <a><h2 style="color: black; font-size: 15px;">Item Details</h2></a><br>
                    <a><h1 style="color: black; font-size: 15px;">Item: <?php echo $item["item_name"]?>  </h1></a><br>            
                    <a><h1 style="color: black; font-size: 15px;">Item Quantity: <?php echo $item["item_qty"]; ?>  </h1></a><br>
                    <a><h1 style="color: black; font-size: 15px;">Item Price: <?php echo "€ ".$item["item_price"]; ?></h1></a><br><br>
                    
            <?php
                /* Calculate Total */
                $total += ($item["item_price"] * $item["item_qty"]);       
                }  // Close foreach loop
            ?><a><h2 style="color: black; font-size: 15px;">Total Price</h2></a><br>
                    <?php echo '<a><h1 style="color: black; font-size: 15px;">Total Price: € '. $total. '</h1></a><br>';   ?>
        </div>
                                
			</div>
               
</div>
        </div>
	<!--start-ckeckout-->
		<div class="information">
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
						<li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
						<li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Information</h3>
					<ul>
						<li><a href="#"><p>Specials</p></a></li>
						<li><a href="#"><p>New Products</p></a></li>
						<li><a href="#"><p>Our Stores</p></a></li>
						<li><a href="contact.html"><p>Contact Us</p></a></li>
						<li><a href="#"><p>Top Sellers</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>My Account</h3>
					<ul>
						<li><a href="account.html"><p>My Account</p></a></li>
						<li><a href="#"><p>My Credit slips</p></a></li>
						<li><a href="#"><p>My Merchandise returns</p></a></li>
						<li><a href="#"><p>My Personal info</p></a></li>
						<li><a href="#"><p>My Addresses</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Store Information</h3>
					<h4>Luxury Watches
						<span>We are situated in,</span>
						Dublin City, Co. Dublin, Ireland</h4>
					<h5>+955 123 4567</h5>	
					<p><a href="mailto:example@email.com">luxurywatch@gmail.com</a></p>
				</div>
			</div>
		</div>
	</div>
	<!--information-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 footer-left">
					<form>
						<input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
						<input type="submit" value="Subscribe">
					</form>
				</div>
				<div class="col-md-6 footer-right">					
                                    <p><a href="login.php" target="_blank">Login</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
        <br>
        <br>
        <br>
        <br>
        <br>
	<?php 
/* Get header */
    require_once("footer.php");
?>  
  	
</body>
</html>

