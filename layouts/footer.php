<footer id="page_footer">
    <!-- address -->
    <div id="contact" class="address"> 
        <div class="container">
            <div class="agile-title">
                <h3> Contact Us</h3>
            </div>
            <ul>
                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Broome St, Canada, NY 10002, New York</li>
                <li><i class="fa fa-phone" aria-hidden="true"> </i>  <a href="tel:<?php echo DEVELOPER_TEL; ?>"><?php echo DEVELOPER_TEL; ?></a></li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?php echo DEVELOPER_MAIL; ?>"> <?php echo DEVELOPER_MAIL; ?></a></li>
            </ul>
        </div>
    </div>
    <!-- //address -->
    <!-- contact -->
    <a id="hotel_location"/>
    <div class="contact">
        <div class="col-md-6 contact-left">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57537.641430789925!2d-74.03215321337959!3d40.719122105634035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1456152197129" allowfullscreen=""></iframe>
        </div>
        <div class="col-md-6 contact-right">
            <div class="wthree-contact-row">
                <h4>Get In Touch</h4> 
                <form action="#" method="post">
                    <input type="text" name="name" placeholder="Name" required="">
                    <input class="email" type="text" name="email" placeholder="Email" required="">
                    <textarea placeholder="Message" name="message" required=""></textarea>
                    <input type="submit" value="SUBMIT">
                </form>  
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!-- //contact -->
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="social-icon">
                <a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
                <a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a> 
                <a href="#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a>
                <a href="#" class="social-button skype"><i class="fa fa-skype"></i></a>
            </div>
            <p>
                © 2017 <?php echo SITE_TITLE; ?>. All rights reserved
                |
                Developed by <a href="#"><?php echo DEVELOPER_NAME; ?></a>
            </p>
        </div>
    </div>
</footer>
<!-- //footer -->	 
<!-- swipe box js -->
<script src="js/jquery.swipebox.min.js"></script> 
<script type="text/javascript">
    jQuery(function ($) {
        $(".swipebox").swipebox();
    });
</script>
<!-- //swipe box js --> 
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

//        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- //smooth-scrolling-of-move-up -->  
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.js"></script>
</body>
</html>