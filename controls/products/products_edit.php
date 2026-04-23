<?php
$productsObj = new products();
$categoriesObj = new categories();

$formErrors = null;
$data = array();
$productReviews = array();

$required = array('name', 'price', 'stock_quantity', 'sku', 'fk_Categories');

if(!empty($_POST['submit'])) {
    $validations = array (
        'name' => 'anything',
        'price' => 'price',
        'stock_quantity' => 'positivenumber',
        'sku' => 'anything',
        'fk_Categories' => 'positivenumber'
    );

    $validator = new validator($validations, $required);

    if($validator->validate($_POST)) {
        $dataPrepared = $_POST;
        $dataPrepared['id'] = $id;
        $productsObj->updateProduct($dataPrepared);

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
} else {
    $data = $productsObj->getProduct($id);
    $productReviews = $productsObj->getProductReviews($id);
}

include "templates/{$module}/{$module}_form.tpl.php";
?>