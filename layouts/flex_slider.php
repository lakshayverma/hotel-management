<!-- banner-text -->
<div class="banner-text"> 
    <div class="flexslider">
        <ul class="slides">
            <li>
                <h2>Welcome to <?= strtoupper(SITE_TITLE); ?></h2>
                <p>
                    Are you on a hunt for perfect family vacation or a business trip getaway?
                    We are the place of your choice
                </p>
                <a href="#" class="more" data-toggle="modal" data-target="#myModal">BOOK NOW</a>  
            </li>
            <li>
                <h3>Have a GREAT Time with OUR</h3>
                <p>
                    Our Hotel is a perfect holiday destination both for the families with kids and for individuals. Our glorious mountainous landscapes will lighten your stay through all the seasons!
                </p>
                <a href="#" class="more" data-toggle="modal" data-target="#myModal">BOOK NOW</a>  
            </li>
            <li>
                <h3>We will be so PROUD to </h3>
                <p>
                    Be our GUEST
                </p>
                <a href="#" class="more" data-toggle="modal" data-target="#myModal">BOOK NOW</a>
            </li>
        </ul>
    </div>  
    <!-- modal -->
    <?php include 'booking_form.php'; ?>
    <!-- //FlexSlider -->
</div> 
<!-- //banner-text --> 
