<?php
session_start();

/* Read posted data */
require_once "error_messages.php";  // contains a list of error messages that can be assigned to $_SESSION["error_message"]

$email = ltrim(rtrim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)));
if ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL)))
{
    $_SESSION["error_message"] = $ERROR_MESSAGE_INVALID_OR_EMPTY_FIELD;
    header("location: register_new_user.php"); // deal with invalid input
    exit();
}

$confirmEmail = ltrim(rtrim(filter_input(INPUT_POST, "confirmEmail", FILTER_SANITIZE_EMAIL)));
if ((empty($confirmEmail)) || (!filter_var($confirmEmail, FILTER_VALIDATE_EMAIL)))
{
    $_SESSION["error_message"] = $ERROR_MESSAGE_INVALID_OR_EMPTY_FIELD;
    header("location: register_new_user.php"); // deal with invalid input
    exit();
}


/* Validate input data */
if ($email != $confirmEmail)
{
    $_SESSION["error_message"] = $ERROR_MESSAGE_EMAILS_DO_NOT_MATCH;
    header("location: register_new_user.php");
}


/* Connect to the database */
require_once "configuration.php";



/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception



/* Check that user is not already user_added  */
$query = "SELECT email FROM users WHERE email = :email";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":email", $email, PDO::PARAM_STR);
$statement->execute();

if ($statement->rowCount() > 0)
{
    $_SESSION["error_message"] = $ERROR_MESSAGE_EMAIL_ALREADY_REGISTERED;
    header("location: login.php");
    exit();
}


/* Check that the user is not already pending */
$query = "DELETE FROM pending_users WHERE email = :email";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":email", $email, PDO::PARAM_STR);
$statement->execute();


/* Create new pending user */
$expiry_time_stamp = 1200 + $_SERVER["REQUEST_TIME"]; // 1200 = 20 minutes from now
$token = sha1(uniqid($email, true));

$query = "INSERT INTO pending_users (token, email, expiry_time_stamp) VALUES (:token, :email, :expiry_time_stamp)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":token", $token, PDO::PARAM_STR);
$statement->bindParam(":email", $email, PDO::PARAM_STR);
$statement->bindParam(":expiry_time_stamp", $expiry_time_stamp, PDO::PARAM_INT);
$statement->execute();


/* remove all old pending users from database */
$query = "DELETE FROM pending_users WHERE expiry_time_stamp < :expiry_time_stamp";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":expiry_time_stamp", $_SERVER["REQUEST_TIME"], PDO::PARAM_INT);
$statement->execute();
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

    <title>Register New User</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400">
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">                
    <link rel="stylesheet" href="style/bootstrap.min.css">                                      
    <link rel="stylesheet" href="style/templatemo-style.css">                                  
    <link rel="icon" type="image/ico" href="img/favicon.ico">
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
    
        <div class="container-fluid">
<div class="row">
              <div id="tm-section-1" class="tm-section">
                <div class="col-md-12">
                    <h1 class="text-xs-center blue-text tm-title">Register New User</h1>          
                </div>
              </div>    

                    <div class="row gray-bg">
  <section id="tm-section-4" class="tm-section">
                    <div class="tm-container">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <?php
/* Provide feedback and provide a way for the user to proceed or automatically redirect to a new webpage */

echo "<a href ='" . $siteName . '/confirm_registration.php?token=' . $token . "'>" . $siteName . '/confirm_registration.php?token=' . $token . "</a>";
echo "<br><br><br>";


echo "An email has been sent to you to activate your new account.<br><br>" .
 "If you do not receive an email, please check your junk folder for an email from us. Our email is:<br>" .
 "<strong>D00123456.student.dkit.ie</strong><br><br>" .
 "If you still cannot find our email, please add our email address to your email whitelist and attempt to recover your email again.<br><br>";



$subject = "DkIT Login Example Register New User";
$comment = "You are receiving this email because you requested to register with DkIT Login Example." .
        " If you did not request to register with us, then simply ignore this email.<br><br>" .
        "Click on the link below to register:<br>" .
        "<a href = '" . $siteName . "/confirm_registration.php?token=" . $token . "'>" . $siteName . '/confirm_registration.php?token=' . $token . "</a><br><br>" .
        "If the link above does not work, then cut-and-paste it into your browser address bar and run it from there.<br><br>" .
        "<br><br>Yours Sincerly<br>DkIT Login Example Registration Team";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($email, $subject, $comment, $headers);
?>
                        </div>
                    </div>                    
                </section>
                </div>
              </div>                
            </div>

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