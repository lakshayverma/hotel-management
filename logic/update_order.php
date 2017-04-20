<?php

require_once '../includes/initialize.php';
$current_user = $session->get_user_object();


$content_id = (isset($_POST['content_id'])) ? $_POST['content_id'] : false;
$content_status = (isset($_POST['content_status'])) ? $_POST['content_status'] : false;
$response["updated"] = false;

if ($content_id & $content_status) {
    $order_item = Order_contents::find_by_id($content_id);
    $order_item->status = $content_status;
    $order_item->save();
    $response['content'] = $order_item;
    $response["updated"] = true;
}

echo json_encode($response);
