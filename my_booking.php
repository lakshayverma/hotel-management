<?php
$nav_only = TRUE;
include './layouts/header.php';
members_only();
$bookings = Booking::find_all_for_account($current_user->id);
$booking_id = (isset($_GET['booking'])) ? $_GET['booking'] : current($bookings)->id;
//$current_booking = Booking::find_by_id($booking_id);
//$current_booking = ($current_booking) ? $current_booking : current($bookings);
?>
<div class="container-fluid">
    <!--Bookings Navigation-->
    <div class="col-md-3">
        <ul class="list-group bookings">
            <li class="list-group-item mandy">
                <a href="#" class="mandy-btn" data-toggle="modal" data-target="#myModal">Book a New Facility</a>
            </li>

            <?php
            while ($booking = current($bookings)) {
                $booking->init_members();
                ?>
                <li id="booking-<?php echo $booking->id ?>" class="w3ls-row list-group-item mandy" >
                    <a class="selector_mk" onclick="get_details(<?php echo $booking->id; ?>); return false;">
                        <span class="list-group-item-heading"><?php echo $booking->facilityObj->avatar("72px", "zoom-img"); ?></span>
                        <h4 style="display: inline-block;"><?php echo $booking->facilityObj->name(); ?></h4>
                        <br>
                        <span class="text-center text-info"><em>(<?php echo $booking->check_in(); ?>)</em></span>
                    </a>
                </li>
                <?php
                next($bookings);
            }
            ?>
        </ul>
        <?php include './layouts/booking_form.php'; ?>
    </div>
    <!--Booking Navigation End-->

    <!--Booking Orders-->
    <div id="booking_details" class="col-md-8"></div>
    <!--Booking Orders End-->
</div>
<?php include './layouts/footer.php'; ?>

<script>
    get_details(<?php echo $booking_id; ?>);
    
</script>