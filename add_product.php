<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    header("location: login.php");
    exit();
}
if($_SESSION["access_level"] == 2)
{
    header("location: login.php");
    exit();
}
?>
<?php
if (!isset($_SESSION["user_id"]))
{
    header("location: login.php");
    exit();
}
if ($_SESSION["access_level"] == 2)
{
    header("location: login.php");
    exit();
}
?>
<?php
require_once ("database_1.php");

$category = filter_input(INPUT_POST, "category");
$name = filter_input(INPUT_POST, "name");
$price = filter_input(INPUT_POST, "price");
$image = "omega_Speedmaster.jpg";
        
$insertQuery = "INSERT INTO shopping_items (category, item_name, item_price, item_image)"
        . " VALUES (:category, :item_name, :price, :image)";
$statement = $db -> prepare($insertQuery);
$statement -> bindValue(":category", $category);
$statement -> bindValue(":item_name", $name);
$statement -> bindValue(":price", $price);
$statement -> bindValue(":image", $image);
$statement -> execute();
$statement -> closeCursor();
?>


<?php 
    /* Get header */
    require_once("headerUser.php");
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
        <!--dropdown-->
        <script src="js/jquery.easydropdown.js"></script>			
    </head>
    <body> 
        <!--top-header-->
        <div class="logo" style="background-color: white;">
            <a href='add_product_form.php'><h1 style="color: black; font-size: 20px;" >Add new Item</h1></a>
            &nbsp;
      </div>
        <div class="top-header" style="background-color: white;">
            
            <div class="container">  
                <div class="top-header-main">
                  
                        </div>
                    </div>
                </div>
 
        <div style="text-align: center; ">                        
            <p>Item has been added.</p>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br><br><br><br><br><br>
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
                            <input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '')
                                                        {
                                                            this.value = 'Enter Your Email';
                                                        }">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                    <div class="col-md-6 footer-right">					
                        <p><a href='logout_transaction.php'>Logout</a></p>
                        <p><a href='admin_stuff.php'>Admin Controls</a></p> 
                    </div>
                </div>
            </div>
        </div>
        <!--footer-end-->
        <?php 
/* Get header */
    require_once("footer.php");
?> 
    </body>
</html>


