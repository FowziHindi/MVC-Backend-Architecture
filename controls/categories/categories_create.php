<?php
$categoriesObj = new categories();
$formErrors = null;
$data = array();

if(!empty($_POST['submit'])) {
    $validations = array(
        'name' => 'anything',
        'slug' => 'anything',
        'display_order' => 'positivenumber',
        'image_url' => 'anything'
    );

    $validator = new validator($validations);

    if($validator->validate($_POST)) {
        $dataPrepared = $_POST;
        $dataPrepared['is_active'] = isset($_POST['is_active']) ? 1 : 0;
        $categoriesObj->insertCategory($dataPrepared);

        header("Location: index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
}

include "templates/{$module}/{$module}_form.tpl.php";
?>