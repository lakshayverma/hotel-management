<!Doctype html>
<?php
require_once('includes/initialize.php');
global $session;
$current_user = $session->get_user_object();
?>
<html lang="en">
    <head>
        <title><?php echo (isset($title)) ? $title : SITE_TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ /*window.scrollTo(0,1);*/ } </script>
        <!-- Custom Theme files -->
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" /> 
        <link rel="stylesheet" href="css/swipebox.css">
        <link rel="stylesheet" href="css/select2.css">
        <link href="css/custom.css" type="text/css" rel="stylesheet" media="all">  
        <!-- //Custom Theme files -->
        <!-- font-awesome icons -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- //font-awesome icons -->
        <!-- js -->
        <script src="js/jquery-2.2.3.min.js"></script> 
        <script src="js/jquery.validate.min.js"></script> 
        <!-- //js -->
        <!-- web-fonts -->
        <link href='//fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- //web-fonts -->
        <!-- start-smooth-scrolling -->
        <script type="text/javascript" src="js/select2.min.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <script type="text/javascript" src="js/jsrender.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- //end-smooth-scrolling -->	
    </head>
    <body>
        <?php if ($session->message()): ?>
            <div class="container-fluid" id="page_message">
                <h4 class="text-danger text-center"><?php echo $session->message(); ?></h4>
            </div>
        <?php endif; ?>

        <div class="banner simple" id="page_header">

            <?php if (isset($custom_header) && $custom_header): ?>
            <?php else: ?>
                <!-- banner -->
                <?php include 'navigation.php'; ?>
                <?php if (isset($nav_only) && !$nav_only): ?>
                    <?php include 'flex_slider.php'; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
