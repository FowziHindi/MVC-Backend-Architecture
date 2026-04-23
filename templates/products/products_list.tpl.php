<?php
$breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Home'), array('title' => 'Products'));
include 'templates/common/breadcrumb.tpl.php';
?>

    <div class="d-flex flex-row-reverse gap-3">
        <a href='index.php?module=<?php echo $module; ?>&action=create'>New product</a>
    </div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">Product was not removed because it is part of an order.</div>
<?php } ?>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>SKU</th>
            <th></th>
        </tr>
        <?php
        foreach($data as $key => $val) {
            echo "<tr>"
                    . "<td>{$val['id']}</td>"
                    . "<td>{$val['name']}</td>"
                    . "<td>{$val['category_name']}</td>"
                    . "<td>{$val['price']}</td>"
                    . "<td>{$val['stock_quantity']}</td>"
                    . "<td>{$val['sku']}</td>"
                    . "<td class='d-flex flex-row-reverse gap-2'>"
                    . "<a href='index.php?module={$module}&action=edit&id={$val['id']}'>Edit</a>"
                    . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id']}\"); return false;'>Remove</a>&nbsp;"
                    . "</td>"
                    . "</tr>";
        }
        ?>
    </table>

<?php include 'templates/common/paging.tpl.php'; ?>