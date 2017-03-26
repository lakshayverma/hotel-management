<?php
require_once '../includes/initialize.php';
$current_user = $session->get_user_object();
$booking = $_POST['booking'];
$order = Order_booking::make($current_user->id, $booking);
$order->create_new();
if ($order->id) {
    $menu_item = $_POST['menu_item'];
    $quantity = $_POST['quantity'];

    $order_items = array();

    while (($item = current($menu_item)) && ($qty = current($quantity))) {
        $order_item = Order_contents::make($order->id, $item, $qty);
        $order_item->save();
        echo $item;
        $order_items[] = $order_item;
        next($menu_item);
        next($quantity);
    }
//    $redirect_url = (isset($_POST['redirect_url'])) ? $_POST['redirect_url'] : "../my_bookings.php?booking={$booking}";
    redirect_to("http://localhost/mannhotel/my_booking.php?booking={$booking}");
}
?>

<pre>
    <?php
//    print_r($_POST);
//    print_r($menu_item);
//    print_r($order);
//    print_r($order_items);
    ?>
</pre>