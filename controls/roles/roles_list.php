<?php
$rolesObj = new roles();
$formErrors = null;

$elementCount = $rolesObj->getRolesCount();
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);
$paging->process($elementCount, $pageId);

$data = $rolesObj->getRolesList($paging->size, $paging->first);


include "templates/{$module}/{$module}_list.tpl.php";
?>