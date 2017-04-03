<?php

require_once './../includes/initialize.php';
$cpn = (isset($_POST['coupon'])) ? $_POST['coupon'] : FALSE;
$bkng = (isset($_POST['booking'])) ? $_POST['booking'] : FALSE;
$amnt = (isset($_POST['amount'])) ? $_POST['amount'] : FALSE;

$response = array();
$response['error'] = TRUE;
$response['data'] = array();
if ($cpn && $bkng & $amnt) {
    $coupon = Discount_coupons::find_by_id($cpn);
    $bill = $coupon->process($amnt);
    $response['bill'] = $bill;
    $response['error'] = FALSE;
    
    if ($amnt == $bill) {
        $response['error'] = TRUE;
        $response['msg'] = "You are not eligible for this coupon.";
    }
    
} else {
    $response['error'] = TRUE;
    $response['msg'] = 'There was a problem processing your coupon.';
}

log_action("aa", json_encode($_POST));
log_action("aa", json_encode($response));
echo json_encode($response);
