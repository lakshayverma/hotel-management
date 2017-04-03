<?php
$nav_only = FALSE;
include './layouts/header.php';
?>
<a id="mLocation" href="#hotel_location" class="scroll">
<!--    <span class="glyphicon glyphicon-home"></span>-->
    
    <img src="images/pin.png" width="32px" height="32px"/>

</a>

<div id="about" class="welcome"> 
    <div class="container">
        <div class="agile-title">
            <h3> Welcome !</h3>
        </div>
        <div class="w3ls-row">
            <div class="col-md-6 welcome-left">
                <div class="welcome-img">
                    <img src="hotel_pics/lobby9.jpg" class="img-responsive zoom-img" alt=""/>
                </div>
                <div class="col-md-6 welcome-left-grids">
                    <div class="welcome-img">
                        <img src="hotel_pics/room1.jpg" class="img-responsive zoom-img" alt=""/>
                    </div>
                </div>
                <div class="col-md-6 welcome-left-grids">
                    <div class="welcome-img">
                        <img src="hotel_pics/lobby3.jpg" class="img-responsive zoom-img" alt=""/>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-6 welcome-right"> 
                <p>A good hotel shouldn’t be necessarily expensive. Check this out yourself. Book a room and get all possible comfort of a five star hotel. We work for you to enjoy your stay.</p>
                <div class="open-hours-row">
                    <div class="col-md-3 open-hours-left">
                        <h4>OPENING HOURS </h4>
                    </div>
                    <div class="col-md-3 open-hours-left">
                        <h6>BREAKFAST</h6>
                        <h5>7am - 12am</h5> 
                    </div>
                    <div class="col-md-3 open-hours-left">
                        <h6>MAIN MENU</h6>
                        <h5>12am - 12pm</h5> 
                    </div>
                    <div class="col-md-3 open-hours-left">
                        <h6>SPECIALS</h6>
                        <h5>8pm - 11pm</h5> 
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div> 
    </div>
</div>
<!-- //welcome --> 

<!-- slid -->
<div class="slid">
    <div class="container">
        <h4>Today Special</h4>
        <h5>50% <span>Offer</span></h5>
        <p>
            In malesuada accumsan felis, a imperdiet arcu blandit sed. Ut id faucibus eros. Fusce sed vulputate dui, non consectetur felis. Etiam id enim sem. Suspendisse commodo tempor magna 
        </p>
    </div> 
</div>
<!-- //slid -->
<!-- menu -->
<div id="menu" class="menu">  
    <div class="container">
        <div class="agile-title">
            <h3> Our Menu</h3>
        </div>
        <ul class="accordion"> 
            <?php
            $menu = Menu::find_expensive(5);
            $counter = 1;
            while ($item = current($menu)):
                ?>
                <li class="slide-<?php echo $counter; ?>">
                    <div class="menu-left">
                        <img src="<?php echo $item->img(); ?>" alt=""/>
                        <div class="menu-right">
                            <h4><?php echo $item->name(); ?> </h4>
                            <h5>₹<?php echo $item->price * 10; ?> </h5>
                            <p><?php echo $item->description; ?></p>
                        </div>
                    </div>  
                </li>
                <?php
                next($menu);
                $counter++;
            endwhile;
            ?>
        </ul>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //menu -->
<!-- team -->
<div id="team" class="team">  
    <div class="container">
        <div class="agile-title">
            <h3> Our Team</h3>
        </div>
        <div class="team-row">  
            <?php
            $objects = Account::find_admins(5);
            while ($object = current($objects)):
                ?>

                <div class="col-md-3 team-grids">   
                    <div class="w3ls-effect">
                        <?php echo $object->avatar("72px"); ?>
                        <div class="view-caption">
                            <h4><?php echo $object->name(); ?></h4> 
                            <p><?php echo $object->user_name; ?></p>
                        </div>
                    </div>    
                </div>
                <?php
                next($objects);
            endwhile;
            ?>

            <div class="clearfix"> </div> 
        </div>
    </div>
</div>
<!-- //team -->
<!-- facility's -->
<div id="facility" class="facility">
    <div class="container">
        <div class="agile-title">
            <h3>Facilities Available</h3>
        </div>
        <div class="gallery-agileinfo-row">  

            <?php
            $facilities = Facility::show_case();
            while ($facility = current($facilities)):
                ?>
                <div class="col-md-4 gallery-grids">
                    <div class="hover ehover14">
                        <a href="" class="swipebox" title="">
                            <img src="<?php echo $facility->img(); ?>"/>
                            <div class="overlay">
                                <h4><?php echo $facility->name(); ?></h4>
                                <div class="info nullbutton button" data-toggle="modal" data-target="#modal14">Show More</div>
                            </div>
                        </a>	
                    </div>
                </div>
                <?php
                next($facilities);
            endwhile;
            ?>
            <div class="clearfix"> </div> 
        </div>
    </div>
</div>
<!-- //facility's -->
<?php include './layouts/footer.php'; ?>