<?php
$breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Home'), array('title' => 'Orders'));
include 'templates/common/breadcrumb.tpl.php';
?>

    <div class="d-flex flex-row-reverse gap-3">
        <a href='index.php?module=<?php echo $module; ?>&action=create'>New order</a>
    </div>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Payment Method</th>
            <th>Total Price</th>
            <th></th>
        </tr>
        <?php
        if(!empty($data)) {
            foreach($data as $val) {
                echo "<tr>"
                        . "<td>{$val['id']}</td>"
                        . "<td>{$val['order_date']}</td>"
                        . "<td>" . ($val['username'] ?? 'N/A') . "</td>"
                        . "<td>{$val['status']}</td>"
                        . "<td>{$val['payment_method']}</td>"
                        . "<td>{$val['total_amount']} €</td>"
                        . "<td class='d-flex flex-row-reverse gap-2'>"
                        . "<a href='index.php?module={$module}&action=edit&id={$val['id']}'>Edit</a>"
                        . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id']}\"); return false;'>Remove</a>"
                        . "</td>"
                        . "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>No orders found.</td></tr>";
        }
        ?>
    </table>

<?php include 'templates/common/paging.tpl.php'; ?>