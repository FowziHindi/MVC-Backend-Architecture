<?php

$categoriesObj = new categories();

// count the sum number of entries
$elementCount = $categoriesObj->getCategoryListCount();

// create paging class object
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// form list pages
$paging->process($elementCount, $pageId);

// select indicated page categories
$data = $categoriesObj->getCategoryList($paging->size, $paging->first);

// include template
include "templates/{$module}/{$module}_list.tpl.php";

?>