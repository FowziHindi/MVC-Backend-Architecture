<?php
$usersObj = new users();
$formErrors = null;
$data = array();

if(!empty($_POST['submit'])) {
    $validations = array(
        'username' => 'anything',
        'email' => 'email',
        'password_hash' => 'anything',
        'fk_Roles' => 'positivenumber'
    );

    $validator = new validator($validations);

    if($validator->validate($_POST)) {
        $dataPrepared = $_POST;
        $dataPrepared['created_at'] = date('Y-m-d');
        $dataPrepared['is_active'] = isset($_POST['is_active']) ? 1 : 0;

        $usersObj->insertUser($dataPrepared);

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
}

include "templates/{$module}/{$module}_form.tpl.php";
?>