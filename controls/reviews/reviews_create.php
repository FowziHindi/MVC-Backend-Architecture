<?php
$reviewsObj = new reviews();
$usersObj = new users();
$productsObj = new products();

$formErrors = null;
$data = array();

// Catch the F4 product ID from the link
if(isset($_GET['fk_Products'])) {
    $data['fk_Products'] = $_GET['fk_Products'];
}

if(!empty($_POST['submit'])) {
    $validations = array(
        'fk_Products' => 'positivenumber',
        'fk_Users' => 'positivenumber',
        'rating' => 'positivenumber'
    );

    $validator = new validator($validations);

    if($validator->validate($_POST)) {
        $reviewsObj->insertReview($_POST);
        common::redirect("index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
}

include "templates/{$module}/{$module}_form.tpl.php";
?>