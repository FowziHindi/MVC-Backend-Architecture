<?php
$reviewsObj = new reviews();

if(!empty($id)) {
    $reviewsObj->deleteReview($id);
    common::redirect("index.php?module={$module}&action=list");
    die();
}
?>