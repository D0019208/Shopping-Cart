<?php
session_start();
?>
<?php 
    /* Get header */
    require_once("header.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400">
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">                
    <link rel="stylesheet" href="style/bootstrap.min.css">                                      
    <link rel="stylesheet" href="style/templatemo-style.css">   
    <link href="style/style_1.css" rel="stylesheet" type="text/css"/>
</head>
    <body>
<?php
    /* Show error message for any user input errors if this form was previously submitted */
    if (isset($_SESSION["error_message"]))
    {
        echo "<div class='error_message'><p>" . $_SESSION["error_message"] . "<br>Please input data again.</p></div>";
        unset($_SESSION["error_message"]);
    }
    ?>
        
 <?php
    /* Show error message for any user input errors if this form was previously submitted */
    if (isset($_SESSION["error_message"]))
    {
        echo "<div class='error_message'><p>" . $_SESSION["error_message"] . "<br>Please input data again.</p></div>";
        unset($_SESSION["error_message"]);
    }
    ?>
    
        <div class="container-fluid">
<div class="row">
              <div id="tm-section-1" class="tm-section">
                <div class="col-md-12">
                    <h1 class="text-xs-center blue-text tm-title">Login 
</h1>          
                </div>
              </div>    

                    <div class="row gray-bg">
  <section id="tm-section-4" class="tm-section">
                    <div class="tm-container">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <form action="login_transaction.php" method="post" class="tm-contact-form">                                

                                <div class="form-group">
                                    <input type="email" id="email" name = "email" class="form-control" placeholder="Email"  required autofocus/>
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" id="password" name = "password" class="form-control" placeholder="Password"  required/>
                                </div>
                            
                                <input type="submit" class="btn tm-light-blue-bordered-btn pull-xs-right" value="Login"><br>
                            </form>
<br><a href="register_new_user.php">Register as a new user</a>
                        </div> <!-- col -->
                        
                       
                    </div>                    
                </section>
                </div>
              </div>                
            </div>
            </div>

        </div> <!-- .container -->

        <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap, http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h --> 
        <script src="js/bootstrap.min.js"></script>                 <!-- Bootstrap (http://v4-alpha.getbootstrap.com/) -->
        <script src="js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->           

        <!-- Templatemo scripts -->
        <script>     
         
            $(document).ready(function(){

                var mobileTopOffset = 54;
                var tabletTopOffset = 74;
                var desktopTopOffset = 79;
                var topOffset = desktopTopOffset;

                if($(window).width() <= 767) {
                    topOffset = mobileTopOffset;
                }
                else if($(window).width() <= 991) {
                    topOffset = tabletTopOffset;
                }
              
                /* Single page nav
                -----------------------------------------*/
                $('#tmNavbar').singlePageNav({
                    'currentClass' : "active",
                    offset : topOffset,
                    'filter': ':not(.external)'
                }); 

                if($(window).width() < 570) {
                    $('.tm-full-width-large-table').addClass('table-responsive');
                }
                else {
                    $('.tm-full-width-large-table').removeClass('table-responsive');   
                }
              

                /* Collapse menu after click 
                -----------------------------------------*/
                $('#tmNavbar a').click(function(){
                    $('#tmNavbar').collapse('hide');
                });

              
                /* Handle nav offset & table responsive upon window resize
                --------------------------------------------------------------*/
                $(window).resize(function(){
                    
                    if($(window).width() < 768) {
                        topOffset = mobileTopOffset;
                    } 
                    else if($(window).width() <= 991) {
                        topOffset = tabletTopOffset;
                    }
                    else {
                        topOffset = desktopTopOffset;
                    }

                    $('#tmNavbar').singlePageNav({
                        'currentClass' : "active",
                        offset : topOffset,
                        'filter': ':not(.external)'
                    });

                    if($(window).width() < 570) {
                        $('.tm-full-width-large-table').addClass('table-responsive');
                    }
                    else {
                        $('.tm-full-width-large-table').removeClass('table-responsive');   
                    }
                });
                          
            });

        </script> 
        <br>
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
