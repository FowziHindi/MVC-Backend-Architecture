<?php
$rolesObj = new roles();

if(!empty($id)) {
    $rolesObj->deleteRole($id);
    common::redirect("index.php?module={$module}&action=list");
    die();
}
?>