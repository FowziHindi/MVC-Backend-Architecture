<?php
// Get filter inputs
$categoryId = isset($_GET['category_id']) ? mysql::escapeFieldForSQL($_GET['category_id']) : '';
$minPrice = isset($_GET['min_price']) ? mysql::escapeFieldForSQL($_GET['min_price']) : '';
$dateFrom = isset($_GET['date_from']) ? mysql::escapeFieldForSQL($_GET['date_from']) : '';

// Build dynamic WHERE clause
$whereClause = "WHERE 1=1";
if (!empty($categoryId)) {
    $whereClause .= " AND c.id = '{$categoryId}'";
}
if (!empty($minPrice)) {
    $whereClause .= " AND p.price >= '{$minPrice}'";
}

// Build dynamic JOIN condition for the date filter (keeps unsold products visible)
$joinCondition = "LEFT JOIN orders o ON oi.fk_Orders = o.id";
if (!empty($dateFrom)) {
    $joinCondition .= " AND o.order_date >= '{$dateFrom}'";
}

// Main Report Query (The "Everything Else" query)
$query = "SELECT 
    UPPER(c.name) AS Category_Name, 
    p.name AS Product_Name, 
    p.sku AS SKU,
    COUNT(DISTINCT o.id) AS Total_Orders, 
    SUM(IF(o.id IS NOT NULL, oi.quantity, 0)) AS Items_Sold, 
    IFNULL(ROUND(AVG(IF(o.id IS NOT NULL, oi.price_at_purchase, NULL)), 2), 0) AS Avg_Purchase_Price, 
    IFNULL(MAX(IF(o.id IS NOT NULL, oi.quantity, NULL)), 0) AS Max_Items_In_One_Order
FROM categories c
INNER JOIN products p ON p.fk_Categories = c.id
LEFT JOIN order_items oi ON oi.fk_Products = p.id
{$joinCondition}
{$whereClause}
GROUP BY c.id, p.id
ORDER BY Items_Sold DESC";

$reportData = mysql::select($query);

// Grand Total Query (The "2nd query" requirement)
$grandTotalQuery = "SELECT 
    COUNT(DISTINCT o.id) AS Grand_Total_Orders, 
    SUM(IF(o.id IS NOT NULL, oi.quantity, 0)) AS Grand_Items_Sold, 
    IFNULL(ROUND(AVG(IF(o.id IS NOT NULL, oi.price_at_purchase, NULL)), 2), 0) AS Grand_Avg_Price, 
    IFNULL(MAX(IF(o.id IS NOT NULL, oi.quantity, NULL)), 0) AS Grand_Max_Items
FROM categories c
INNER JOIN products p ON p.fk_Categories = c.id
LEFT JOIN order_items oi ON oi.fk_Products = p.id
{$joinCondition}
{$whereClause}";

$grandTotalData = mysql::select($grandTotalQuery);
$totals = !empty($grandTotalData) ? $grandTotalData[0] : null;

// Fetch categories for the dropdown
$categories = mysql::select("SELECT id, name FROM categories");

// Load the template
include 'templates/report.tpl.php';
?>