<?php
// breadcrumb array creation
$breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Home'), array('title' => 'Categories'));

include 'templates/common/breadcrumb.tpl.php';
?>

    <div class="d-flex flex-row-reverse gap-3">
        <a href='index.php?module=<?php echo $module; ?>&action=create'>New category</a>
    </div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="error_box">
        Category was not removed. First remove all products belonging to this category.
    </div>
<?php } ?>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Order</th>
            <th>Active</th>
            <th></th>
        </tr>
        <?php
        // table creation
        foreach($data as $key => $val) {
            $activeStatus = $val['is_active'] ? 'Yes' : 'No';
            echo
                    "<tr>"
                    . "<td>{$val['id']}</td>"
                    . "<td>{$val['name']}</td>"
                    . "<td>{$val['slug']}</td>"
                    . "<td>{$val['display_order']}</td>"
                    . "<td>{$activeStatus}</td>"
                    . "<td class='d-flex flex-row-reverse gap-2'>"
                    . "<a href='index.php?module={$module}&action=edit&id={$val['id']}'>Edit</a>"
                    . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id']}\"); return false;'>Remove</a>&nbsp;"
                    . "</td>"
                    . "</tr>";
        }
        ?>
    </table>

<?php
// inclusion of paging template
include 'templates/common/paging.tpl.php';
?>