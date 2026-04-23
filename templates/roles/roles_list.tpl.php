<?php
$breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Home'), array('title' => 'Roles'));
include 'templates/common/breadcrumb.tpl.php';
?>

    <div class="d-flex flex-row-reverse gap-3">
        <a href='index.php?module=<?php echo $module; ?>&action=create'>New Role</a>
    </div>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Role Name</th>
            <th></th>
        </tr>
        <?php
        if(!empty($data)) {
            foreach($data as $val) {
                echo "<tr>"
                        . "<td>{$val['id']}</td>"
                        . "<td>{$val['name']}</td>"
                        . "<td class='d-flex flex-row-reverse gap-2'>"
                        . "<a href='index.php?module={$module}&action=edit&id={$val['id']}'>Edit</a>"
                        . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id']}\"); return false;'>Remove</a>"
                        . "</td>"
                        . "</tr>";
            }
        } else {
            echo "<tr><td colspan='3' class='text-center'>No roles found. Click 'New Role' to add one.</td></tr>";
        }
        ?>
    </table>

<?php include 'templates/common/paging.tpl.php'; ?>