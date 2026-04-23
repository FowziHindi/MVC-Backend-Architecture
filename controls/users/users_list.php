<?php
$usersObj = new users();

$elementCount = $usersObj->getUsersListCount();
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);
$paging->process($elementCount, $pageId);

$data = $usersObj->getUsersList($paging->size, $paging->first);

include "templates/{$module}/{$module}_list.tpl.php";
?>