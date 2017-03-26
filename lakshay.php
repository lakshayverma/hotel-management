<?php

include './layouts/header.php';

$current_booking = Booking::find_by_id(2);
$current_booking->init_members();

include './layouts/footer.php';
