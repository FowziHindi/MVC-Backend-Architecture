<?php
$productsObj = new products();

$elementCount = $productsObj->getProductListCount();
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);
$paging->process($elementCount, $pageId);

$data = $productsObj->getProductList($paging->size, $paging->first);

include "templates/{$module}/{$module}_list.tpl.php";
?>