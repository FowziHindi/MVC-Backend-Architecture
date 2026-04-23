<?php
$categoriesObj = new categories();

if(!empty($id)) {
    // Check if category has products before deleting
    $count = $categoriesObj->getProductCountOfCategory($id);

    $removeErrorParameter = '';
    if($count == 0) {
        $categoriesObj->deleteCategory($id);
    } else {
        $removeErrorParameter = '&remove_error=1';
    }

    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}
?>