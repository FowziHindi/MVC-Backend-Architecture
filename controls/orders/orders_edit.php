<?php
$ordersObj = new orders();
$usersObj = new users();
$productsObj = new products();

$formErrors = null;
$data = array();

if(!empty($_POST['submit'])) {
    $validations = array(
        'fk_Users' => 'positivenumber',
        'status' => 'anything',
        'shipping_address' => 'anything',
        'payment_method' => 'anything',
        'total_price' => 'price'
    );

    $validator = new validator($validations);

    if($validator->validate($_POST)) {
        $dataPrepared = $_POST;
        $dataPrepared['id'] = $id;

        $ordersObj->updateOrder($dataPrepared);
        $ordersObj->updateOrderItems($id, $_POST['fk_Products'], $_POST['quantity']);

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
} else {
    $data = $ordersObj->getOrder($id);
}

include "templates/{$module}/{$module}_form.tpl.php";
?>