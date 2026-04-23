<?php
$breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Home'), array('title' => 'Users'));
include 'templates/common/breadcrumb.tpl.php';
?>

    <div class="d-flex flex-row-reverse gap-3">
        <a href='index.php?module=<?php echo $module; ?>&action=create'>New user</a>
    </div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">User was not removed because they have existing order history.</div>
<?php } ?>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Status</th>
            <th></th>
        </tr>
        <?php
        foreach($data as $key => $val) {
            $status = $val['is_active'] ? 'Active' : 'Inactive';
            echo "<tr>"
                    . "<td>{$val['id']}</td>"
                    . "<td>{$val['username']}</td>"
                    . "<td>{$val['email']}</td>"
                    . "<td>{$val['role_name']}</td>"
                    . "<td>{$val['created_at']}</td>"
                    . "<td>{$status}</td>"
                    . "<td class='d-flex flex-row-reverse gap-2'>"
                    . "<a href='index.php?module={$module}&action=edit&id={$val['id']}'>Edit</a>"
                    . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id']}\"); return false;'>Remove</a>&nbsp;"
                    . "</td>"
                    . "</tr>"; // Added the missing dot here
        }
        ?>
    </table>

<?php include 'templates/common/paging.tpl.php'; ?>