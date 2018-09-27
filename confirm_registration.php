<?php
session_start();
?>
<?php 
    /* Get header */
    require_once("header.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Confirm Registration</title> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400">   
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">               
    <link rel="stylesheet" href="style/bootstrap.min.css">                         
    <link rel="stylesheet" href="style/magnific-popup.css">                                     
    <link rel="stylesheet" href="style/templatemo-style.css">     
    <link href="style/style_1.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/ico" href="img/favicon.ico">
<script>

    function ajaxFillAccessLevelList()
    {
        var fileName = "ajaxGetAccessLevels.php";   /* use POST method to send data to ajax_json_search.php */
        var method = "POST";
        var urlParameterStringToSend = "";   /* Construct a url parameter string to POST to fileName */


        var http_request;
        if (window.XMLHttpRequest)
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            http_request = new XMLHttpRequest();
        }
        else
        {
            // code for IE6, IE5
            http_request = new ActiveXObject("Microsoft.XMLHTTP");
        }


        http_request.onreadystatechange = function ()
        {
            if ((http_request.readyState === 4) && (http_request.status === 200))
            {
                read_http_request_data(http_request.responseText);
            }
        };
        http_request.open(method, fileName, true);
        http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        http_request.send(urlParameterStringToSend);


        function read_http_request_data(data)
        {
            var accessLevelDetails = JSON.parse(data);
            var htmlString = "<select id = 'accessLevel' name = 'accessLevel' required>";
            htmlString += "<option value=''>Select Access Level</option>";
            for (var i = 0; i < accessLevelDetails.length; i++)
            {
                htmlString += "<option value='" + accessLevelDetails[i].id + "'>" + accessLevelDetails[i].name + "</option>";
            }
            htmlString += "</select>";
            document.getElementById('accessLevelDiv').innerHTML = htmlString;
        }
    }
</script>

</head>

<body onload="ajaxFillAccessLevelList()">



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
                    <h1 class="text-xs-center blue-text tm-title">New User Details 
</h1>          
                </div>
              </div>      

                    <div class="row gray-bg">
  <section id="tm-section-4" class="tm-section">
                    <div class="tm-container">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <form action="confirm_registration_transaction.php" method="post" class="tm-contact-form">                                          <div class="form-group">
                                <input type="hidden" id ="token" name = "token">
                                </div>
                                <div class="form-group">
                                    <input type="text" id = "name" name = "name"  class="form-control" placeholder="Name"  required autofocus/>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" name = "email" class="form-control" placeholder="Email"  required/>
                                </div>
                            
                                <div class="form-group">
                                    <input type="password" id="password" name = "password" class="form-control" placeholder="Password"  required/>
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" id="confirmPassword" name = "confirmPassword" class="form-control" placeholder="Confirm Password"  required/>
                                </div>
                                
                                <input type="submit" class="btn tm-light-blue-bordered-btn pull-xs-right" value="Activate Account"><br>
                            </form>   

                        </div> <!-- col -->
  
                    </div>                    
                </section>
                </div>
              </div>                
            

   



</div> <!-- dkit_container -->

<script>
    /* get the 'token' from the url */
    function getURLValue(name)
    {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)";
        var regex = new RegExp(regexS);
        var results = regex.exec(window.location.href);
        if (results === null)
            return null;
        else
            return results[1];
    }

    document.getElementById('token').value = getURLValue('token');
    
    
    
    
    
    
    
    
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
<?php 
/* Get header */
    require_once("footer.php");
?>  
</body>
</html>