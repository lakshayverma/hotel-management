<?php include '../includes/initialize.php'; ?>
<?php

admins_only();

$table = $_POST["table_name"];
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $object = $table::find_by_id($_POST['id']);
    $object->delete();
    $redirect_url = (isset($_POST['redirect_url'])) ? $_POST['redirect_url'] : "../index.php";
    redirect_to($redirect_url);
//    echo $redirect_url;
//    print_r($object);
}else{
    print_r($_POST);
}