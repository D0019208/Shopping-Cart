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
      <a><h1 style="color: black; font-size: 20px;">Brand</h1></a>
      </div>
        <div class="top-header" style="background-color: white;">
            
            <div class="container">  
                <div class="top-header-main">
                  
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style='text-align: center;'>
      
      <ul class="nav navbar-nav " style='text-align: center;'>

                    <?php
                        /*  Display Menus from MySQL Database
                        *   Change 
                        **/
                        foreach($database->findMenuItem() as $menuItem){
    echo "<li class='active' ><a id='{$menuItem['menuName']}' href=index_admin.php?menu=".$menuItem["menuName"]
                            .">" . $menuItem['menuName']."</a></li>";
                        } 
                    ?>
                </ul>
            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--top-header-->
        <!--start-logo-->
        
        <!--start-logo-->
        <!--bottom-header-->
        <!--banner-starts-->
        <div class="bnr" id="home">
            <div  id="top" class="callbacks_container">
                <ul class="rslides" id="slider4">
                    <li>
                        <img src="images/bnr-1.jpg" alt=""/>
                    </li>
                    <li>
                        <img src="images/bnr-2.jpg" alt=""/>
                    </li>
                    <li>
                        <img src="images/bnr-3.jpg" alt=""/>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!--banner-ends--> 
        <!--Slider-Starts-Here-->
        <script src="js/responsiveslides.min.js"></script>
        <script>
                           // You can also use "$(window).load(function() {"
                           $(function ()
                           {
                               // Slideshow 4
                               $("#slider4").responsiveSlides({
                                   auto: true,
                                   pager: true,
                                   nav: true,
                                   speed: 500,
                                   namespace: "callbacks",
                                   before: function ()
                                   {
                                       $('.events').append("<li>before event fired.</li>");
                                   },
                                   after: function ()
                                   {
                                       $('.events').append("<li>after event fired.</li>");
                                   }
                               });

                           });
        </script>
        <!--End-slider-script-->
        <!--about-starts-->
        <div class="about"> 
            <div class="container">
                <div class="about-top grid-1">
                    <div class="col-md-4 about-left">
                        <figure class="effect-bubba">
                            <img class="img-responsive" src="images/rolex.jpg" alt=""/>
                            <figcaption>
                                <h2>Rolex</h2>
                                <p>"Class, ellegance and style"</p>	
                            </figcaption>			
                        </figure>
                    </div>
                    <div class="col-md-4 about-left">
                        <figure class="effect-bubba">
                            <img class="img-responsive" src="images/omega.jpg" alt=""/>
                            <figcaption>
                                <h4>Omega</h4>
                                <p>"Tradition has a future"</p>	
                            </figcaption>			
                        </figure>
                    </div>
                    <div class="col-md-4 about-left">
                        <figure class="effect-bubba">
                            <img class="img-responsive" src="images/zenith.jpg" alt=""/>
                            <figcaption>
                                <h4>Zenith</h4>
                                <p>"Eternity on your wrist"</p>	
                            </figcaption>			
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!--about-end-->
        <div class="logo" style="background-color: black;">
            <a><h1 style="color: white;">Our Selection</h1></a><br>
            <a><h1 style="color: white; font-size: 10px;">"Time is what we want most but we use worst"</h1></a>
        </div>
        
        
        
        
        
        <div class="about">
       <div class='shopping_cart_info_holder'>
        <div class="col-xs-12">
            <a href="#" class="shopping_cart_info" title="Shopping cart item total" style="text-decoration: none;">             
                <i class='glyphicon glyphicon-shopping-cart' style='color:#008cba; font-size:25px;'></i>            
                <span id='items_in_shopping_cart' style='color:#ff5500; font-size:25px;'>
                    <?php 
                        /* If there are items in the basket display total of items, else display 'empty'*/
                        if(isset($_SESSION["items"])){   
                            if(count($_SESSION["items"]) > 0){
                                echo count($_SESSION["items"]);
                            }else{
                                echo "0";
                            }
                        }else{
                            echo "0";
                        }
                    ?>
                </span>
            </a>
        </div>
    </div>

    <!-- Holds shopping cart info with selected items -->
    <div class="shopping_cart_holder">
        <a href="#" class="close_shopping_cart_holder" >Close Cart</a>
        <h2>Shopping Cart</h2>
        <div id="shopping_cart_output">
        </div>
    </div>
    
    <!--    Display Item here-->
    <div class="item_display_holder"></div>

    <!-- Display info about cart update in the middle of the screen -->
    <div id='cart_update_info'></div>

    <?php    
        /* FETCH ITEMS ACCORDING TO CATEGORIES CHOSEN BY USER */
        if(isset($_GET['menu'])){
            $menuCategory = $_GET['menu'];        
            /* If you want to display all items click on ShareMyWeb Logo */
            if($menuCategory =="main"){
                $items = $database->find_by_query("SELECT * FROM shopping_items");    
            /* Categories accordingly */
            }else{            
                $items = $database->find_by_query("SELECT * FROM shopping_items WHERE category='{$menuCategory}'");    
            }
        }else{
            $items = $database->find_by_query("SELECT * FROM shopping_items");    
        }
    ?>  
    
    <div class='container' style='padding:10px;'>
    <!--Display Items in the List -->
        <ul class="list_of_items">
            <?php foreach($items as $item) { ?>
                <div class="col-xs-12 col-sm-4">    
                    <li>                                      
                        <form class="item_form" method="post">                            
                            <div class='item_disp_img_holder'>                                            
                                <img class="item_disp_image" src="images/<?php echo $item["item_image"]; ?>" item_id="<?php echo $item["item_id"]; ?>" alt="<?php echo $item["item_name"]; ?>">
                                <div class='item_title_holder'>
    <span class='item_disp_title'><?php echo $item["item_name"]; ?></span>
                                </div>
                            </div>                    
                            <div style='width:235px; text-align:center; margin:0 auto;'>
                                <span style='font-size:25px;'><?php echo "€".$item["item_price"]; ?></span>
                            </div>
                            <div class="item_disp_values">
                                <div>Quantity:
                                    <select name="item_qty">
                                        <?php
                                            // Choose itemquantity
                                            $maxQty=5;
                                            for($i=1;$i<=$maxQty;$i++){
                                                echo "<option value='{$i}'>$i</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div>Wrist Size:
                                    <select name="item_size">
                                        <?php 
                                            /* Specify size option in array below */
                                            $options=array("38 mm","40 mm","42 mm","45 mm","48 mm");
                                            foreach($options as $option){
                                                echo "<option value='{$option}'>$option</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <input name="item_id" type="hidden" value="<?php echo $item["item_id"]; ?>">
                                <button class='add_item_to_cart' type="submit">Add Item</button>
                            </div>
                        </form>
                    </li>
                </div>
            <?php } ?>
        </ul>
    </div>
        </div>
     <div class="push"></div>

        <!--product-end-->
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


