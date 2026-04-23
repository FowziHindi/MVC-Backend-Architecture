<?php
$ordersObj = new orders();

if(!empty($id)) {
    $ordersObj->deleteOrder($id);
    common::redirect("index.php?module={$module}&action=list");
    die();
}
?>