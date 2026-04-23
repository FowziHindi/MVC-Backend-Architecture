<?php
$reviewsObj = new reviews();
$formErrors = null;

$elementCount = $reviewsObj->getReviewCount();
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);
$paging->process($elementCount, $pageId);

$data = $reviewsObj->getReviewList($paging->size, $paging->first);

include "templates/{$module}/{$module}_list.tpl.php";
?>