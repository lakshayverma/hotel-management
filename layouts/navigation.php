<div class="header"><!-- header -->
    <div class="container">		
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a  href="index.php"><?php echo SITE_TITLE; ?></a></h1>
            </div>
            <!-- navbar-header -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if ((basename($_SERVER["REQUEST_URI"]) == "mannhotel") ||
                            (basename($_SERVER["REQUEST_URI"]) == "index.php")
                    ):
                        ?>
                        <li><a href="#about" class="scroll">About</a></li>
                        <li><a href="#menu" class="scroll">Menu</a></li>
                        <li><a href="#team" class="scroll">Team</a></li>
                        <li><a href="#facility" class="scroll">Facilities</a></li>
                    <?php endif; ?>

                    <?php if (isset($current_user->id)): ?>
                        <li><a href="my_booking.php">My Bookings</a></li>
                        <?php if ($current_user->is_admin()): ?>
                            <li class="dropdown subnav_container">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrations</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="list_tables.php">Admin Area</a>
                                    </li>
                                    <li>
                                        <a href="booking_updates.php">Booking Orders</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <li><a href="logout.php">Logout <?php echo $current_user->name(); ?></a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
                <div class="clearfix"> </div>	
            </div>
        </nav>
    </div> 
</div>
<!-- //header -->