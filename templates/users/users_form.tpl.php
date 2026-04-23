<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?module=<?php echo $module; ?>&action=list">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php if(!empty($id)) echo "Edit User"; else echo "New User"; ?></li>
    </ol>
</nav>

<?php if($formErrors != null) { ?>
    <div class="alert alert-danger" role="alert">
        Please fix the following errors:
        <?php echo $formErrors; ?>
    </div>
<?php } ?>

<form action="" method="post" class="d-grid gap-3">
    <div class="form-group">
        <label for="username">Username<span> *</span></label>
        <input type="text" id="username" name="username" class="form-control" value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>">
    </div>

    <div class="form-group">
        <label for="email">Email<span> *</span></label>
        <input type="email" id="email" name="email" class="form-control" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
    </div>

    <div class="form-group">
        <label for="password_hash">Password (Hashed)<span> *</span></label>
        <input type="text" id="password_hash" name="password_hash" class="form-control" value="<?php echo isset($data['password_hash']) ? $data['password_hash'] : ''; ?>">
    </div>

    <div class="form-group">
        <label for="fk_Roles">Role<span> *</span></label>
        <select id="fk_Roles" name="fk_Roles" class="form-select form-control">
            <option value="-1">Select a role</option>
            <?php
            $roles = $usersObj->getRolesList();
            foreach($roles as $val) {
                $selected = (isset($data['fk_Roles']) && $data['fk_Roles'] == $val['id']) ? " selected='selected'" : "";
                echo "<option{$selected} value='{$val['id']}'>{$val['name']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group form-check">
        <input type="checkbox" id="is_active" name="is_active" class="form-check-input" <?php echo (isset($data['is_active']) && $data['is_active'] == 1) ? 'checked' : ''; ?>>
        <label for="is_active" class="form-check-label">Is Active</label>
    </div>

    <?php if(isset($data['id'])) { ?>
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
    <?php } ?>

    <p class="required-note">* marked fields are required</p>

    <input type="submit" class="btn btn-primary w-25" name="submit" value="Save User">
</form>