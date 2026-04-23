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
        $dataPrepared = $_POST;
        $dataPrepared['id'] = $id;

        $rolesObj->updateRole($dataPrepared);
        common::redirect("index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
} else {
    $data = $rolesObj->getRole($id);
}

include "templates/{$module}/{$module}_form.tpl.php";
?>