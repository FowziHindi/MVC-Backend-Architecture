<?php
$reviewsObj = new reviews();
$usersObj = new users();
$productsObj = new products();

$formErrors = null;
$data = array();

if(!empty($_POST['submit'])) {
    $validations = array(
        'fk_Products' => 'positivenumber',
        'fk_Users' => 'positivenumber',
        'rating' => 'positivenumber'
    );

    $validator = new validator($validations);

    if($validator->validate($_POST)) {
        $dataPrepared = $_POST;
        $dataPrepared['id'] = $id;

        $reviewsObj->updateReview($dataPrepared);
        common::redirect("index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
} else {
    $data = $reviewsObj->getReview($id);
}

include "templates/{$module}/{$module}_form.tpl.php";
?>