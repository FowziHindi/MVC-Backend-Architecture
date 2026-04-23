<?php
$breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Home'), array('title' => 'Reviews'));
include 'templates/common/breadcrumb.tpl.php';
?>

    <div class="d-flex flex-row-reverse gap-3">
        <a href='index.php?module=<?php echo $module; ?>&action=create'>New Review</a>
    </div>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>User</th>
            <th>Rating</th>
            <th>Comment</th>
            <th></th>
        </tr>
        <?php
        if(!empty($data)) {
            foreach($data as $val) {
                echo "<tr>"
                    . "<td>{$val['id']}</td>"
                    . "<td>{$val['product_name']}</td>"
                    . "<td>{$val['username']}</td>"
                    . "<td>{$val['rating']} / 5</td>"
                    . "<td>{$val['comment']}</td>"
                    . "<td class='d-flex flex-row-reverse gap-2'>"
                    . "<a href='index.php?module={$module}&action=edit&id={$val['id']}'>Edit</a>"
                    . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id']}\"); return false;'>Remove</a>"
                    . "</td>"
                    . "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center'>No reviews found.</td></tr>";
        }
        ?>
    </table>
<?php include 'templates/common/paging.tpl.php'; ?>