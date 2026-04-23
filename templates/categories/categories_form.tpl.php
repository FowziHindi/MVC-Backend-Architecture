<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?module=<?php echo $module; ?>&action=list">Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php if(!empty($id)) echo "Edit category"; else echo "New category"; ?></li>
    </ol>
</nav>

<?php if($formErrors) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $formErrors; ?>
    </div>
<?php } ?>

<form action="" method="post" class="mt-4">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
    </div>

    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" id="slug" name="slug" class="form-control" value="<?php echo isset($data['slug']) ? $data['slug'] : ''; ?>">
    </div>

    <div class="mb-3">
        <label for="display_order" class="form-label">Display Order</label>
        <input type="number" id="display_order" name="display_order" class="form-control" value="<?php echo isset($data['display_order']) ? $data['display_order'] : ''; ?>">
    </div>

    <div class="mb-3">
        <label for="image_url" class="form-label">Image URL</label>
        <input type="text" id="image_url" name="image_url" class="form-control" value="<?php echo isset($data['image_url']) ? $data['image_url'] : ''; ?>">
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" id="is_active" name="is_active" class="form-check-input" <?php echo (isset($data['is_active']) && $data['is_active'] == 1) ? 'checked' : ''; ?>>
        <label for="is_active" class="form-check-label">Is Active</label>
    </div>

    <button type="submit" name="submit" value="1" class="btn btn-primary">Save</button>
</form>