<?php

require_once './../includes/initialize.php';
$cpn = (isset($_POST['coupon_id'])) ? $_POST['coupon_id'] : FALSE;
$bkng = (isset($_POST['booking_id'])) ? $_POST['booking_id'] : FALSE;
$amnt = (isset($_POST['amount'])) ? $_POST['amount'] : FALSE;

$response = array();
$response['error'] = TRUE;
$response['data'] = array();
if ($cpn && $bkng && $amnt) {
    $current_booking = Booking::find_by_id($bkng);
    $current_booking->settle();
    $invoice = Invoice::make_for_booking($current_booking);

    $coupon = Discount_coupons::find_by_id($cpn);
    $bill = $coupon->process($amnt);

    $invoice->generation_date = form_date_time();
    $invoice->discount = $cpn;
    $invoice->amount_payable = $bill;
    $invoice->status = "Paid";
    $invoice->save();
    
    $current_booking->check_out = $invoice->generation_date;
    $current_booking->save();
    $response['bill'] = $bill;
    $response['error'] = FALSE;
    $response['data'] = $invoice;

    $url = "../my_booking.php?booking=$current_booking->id";
    redirect_to($url);
} else {
    $response['error'] = TRUE;
    $response['msg'] = 'There was a problem processing your checkout.';
}
?>
<?php print_r($response); ?>