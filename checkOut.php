<?php 
    /* Get header, navigation pane/bar, database_objects file */
    require_once("header.php"); // also checks if session was started 
    /* If session 'items' is not set, redirect back to index.php */
    if(!isset($_SESSION['items']) || count($_SESSION['items'])==0){
        header("location: index.php");
    }


/* Display aded products in the shopping cart */
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
					<li class="active">Checkout</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-ckeckout-->
	<div class="ckeckout">
		<div class="container">
			<div class="ckeck-top heading">
				<h2>Checkout</h2>
			</div>
			<div class="ckeckout-top">
			<table class='table'> <!--Start table that will holds all data in the shopping cart --> 
            <?php
            $total=0; // define total so the script won't throw silly error of a type 'Undefined variable: total in....'
            /* Loops through item session array and display data */
            foreach($_SESSION["items"] as $item){ 			
            ?>                         
            <tr class='itemInCardRow'>            
                <td class='itemInCartDisplay'>
                    <img class='img-responsive item_disp_image' style='max-width:40px; float:left;' src="images/<?php echo $item["item_image"]; ?>">
                </td>
                <td class='itemInCartDisplay'>
                    <?php echo $item["item_name"] .", Wrist size: ". $item["item_size"]; ?>            
                </td>
                <td class='itemInCartDisplay'>                 
                    <?php echo "<span class='quantity'>Quantity: ".$item["item_qty"]."</span>"; ?>                     
                </td>
                <td class='itemInCartDisplay'>
                    <?php echo "€".sprintf("%.2f", ($item["item_price"] * $item["item_qty"])); ?>
                </td>
            </tr>
            <?php
                /* Calculate Total */
                $total += ($item["item_price"] * $item["item_qty"]);

                }  // Close foreach loop
            ?>
            <tr>                 
                <td class='itemInCartDisplay' colspan='4'>
                    <div>
                        <a href='payment.php' title="Go To Payment"><button type="button" class="btn checkout_btn">Go To Payment</button></a>
                        <a href='index.php' title="Continue Shopping"><button type="button" class="btn continue_shopping_btn">Continue Shopping</button></a>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </td>
                 <td class='itemInCartDisplay' style='text-align:right;'>
                    <div class="cart-products-total">                        
                        <span>Total : <span style='font-size:20px; color:#008cba;'></span>
                            <?php
                                // Return a total price with 2 decimals 
                                echo "€".sprintf("%.2f",$total); 
                            ?>
                        </span>
                    </div>
                </td>
            </tr>
        </table>          
		 </div>
                    
		</div>
	</div>
	<!--end-ckeckout-->
	<!--information-starts-->
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
                                    <p><a href="login.php" target="_blank">Login</a> </p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
            <br>
            <br>
            <br>
            <br>
	</div>
	<?php 
/* Get header */
    require_once("footer.php");
?>  
  	
</body>
</html>