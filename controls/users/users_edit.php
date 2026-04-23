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
        $dataPrepared['id'] = $id;
        $dataPrepared['is_active'] = isset($_POST['is_active']) ? 1 : 0;

        $usersObj->updateUser($dataPrepared);

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
} else {
    $data = $usersObj->getUser($id);
}

include "templates/{$module}/{$module}_form.tpl.php";
?>