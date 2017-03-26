<?php
require_once('../includes/initialize.php');
global $session;
$current_user = $session->get_user_object();

if (!$current_user) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $destination = time() . "_" . rand(1000, 9999);

    $user_name = $first_name . "_" . $last_name . "_" . $destination;

    $user_name = strtolower($user_name);

    $person = Person::make($first_name, $last_name, $phone, $email);
    $person->create_blank();

    $account = Account::make($user_name, $person->id, $password);
    $account->save();
    $account->init_members();
} else {
    $account = $current_user;
    $account->init_members();
    $person = $account->personObj;
}

$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];
$capacity = $_POST['capacity'];
$type = $_POST['type'];
$hotel = Hotel::find_by_id(1);

$available = Facility::find_available($capacity, $type, $check_in, $check_out);

$facility = array_shift($available);
$booking = Booking::make($account->id, $facility->id, $check_in, $check_out);
echo $booking->save();
$redirect_url = (isset($_POST['redirect_url'])) ? $_POST['redirect_url'] : "../my_bookings.php?booking={$booking->id}";
redirect_to($redirect_url);

echo '<pre>';
print_r($facility);
echo '</pre>';