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
        $dataPrepared['id'] = $id; // ensure we update the correct ID
        $dataPrepared['is_active'] = isset($_POST['is_active']) ? 1 : 0;

        $categoriesObj->updateCategory($dataPrepared);

        header("Location: index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
} else {
    $data = $categoriesObj->getCategory($id);
}

include "templates/{$module}/{$module}_form.tpl.php";
?>