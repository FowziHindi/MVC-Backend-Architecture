<?php
$rolesObj = new roles();
$formErrors = null;
$data = array();

if(!empty($_POST['submit'])) {
    $validations = array(
        'name' => 'anything'
    );

    $validator = new validator($validations);

    if($validator->validate($_POST)) {
        $rolesObj->insertRole($_POST);
        common::redirect("index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
}

include "templates/{$module}/{$module}_form.tpl.php";
?>