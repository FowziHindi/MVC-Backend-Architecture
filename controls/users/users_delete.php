<?php
$usersObj = new users();

if(!empty($id)) {
    // Check if the user has placed any orders
    $count = $usersObj->getOrderCountOfUser($id);

    $removeErrorParameter = '';
    if($count == 0) {
        $usersObj->deleteUser($id);
    } else {
        // User has order history, don't delete
        $removeErrorParameter = '&remove_error=1';
    }

    common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}
?>