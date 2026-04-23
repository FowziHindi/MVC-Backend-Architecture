<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?module=<?php echo $module; ?>&action=list">Roles</a></li>
        <li class="breadcrumb-item active"><?php if(!empty($id)) echo "Edit Role"; else echo "New Role"; ?></li>
    </ol>
</nav>

<?php if($formErrors != null) { ?>
    <div class="alert alert-danger">
        Please fix: <?php echo $formErrors; ?>
    </div>
<?php } ?>

<form action="" method="post" class="d-grid gap-3">
    <div class="form-group">
        <label for="name">Role Name<span> *</span></label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
    </div>

    <?php if(isset($data['id'])) { ?>
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
    <?php } ?>

    <p class="required-note">* marked fields are required</p>

    <input type="submit" class="btn btn-primary w-25" name="submit" value="Submit">
</form>