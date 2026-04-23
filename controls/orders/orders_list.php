<?php
$ordersObj = new orders();

$elementCount = $ordersObj->getOrderListCount();
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);
$paging->process($elementCount, $pageId);

$data = $ordersObj->getOrderList($paging->size, $paging->first);

include "templates/{$module}/{$module}_list.tpl.php";
?>