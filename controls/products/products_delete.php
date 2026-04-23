<?php
$productsObj = new products();

if(!empty($id)) {
    // Check if the product is linked to any order items
    $count = $productsObj->getOrderItemCountOfProduct($id);

    $removeErrorParameter = '';
    if($count == 0) {
        $productsObj->deleteProduct($id);
    } else {
        // Product is in an order, show error
        $removeErrorParameter = '&remove_error=1';
    }

    common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}
?>