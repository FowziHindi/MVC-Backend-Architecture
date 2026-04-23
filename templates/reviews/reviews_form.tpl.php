<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?module=<?php echo $module; ?>&action=list">Reviews</a></li>
        <li class="breadcrumb-item active"><?php if(!empty($id)) echo "Edit Review"; else echo "New Review"; ?></li>
    </ol>
</nav>

<?php if($formErrors != null) { ?>
    <div class="alert alert-danger">Please fix: <?php echo $formErrors; ?></div>
<?php } ?>

<form action="" method="post" class="d-grid gap-3">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="fk_Products_display">Product<span> *</span></label>
            <select id="fk_Products_display" class="form-select" disabled>
                <option value="">Select Product</option>
                <?php
                $products = $productsObj->getProductList();
                foreach($products as $val) {
                    $selected = (isset($data['fk_Products']) && $data['fk_Products'] == $val['id']) ? "selected" : "";
                    echo "<option value='{$val['id']}' {$selected}>{$val['name']}</option>";
                }
                ?>
            </select>
            <input type="hidden" name="fk_Products" value="<?php echo isset($data['fk_Products']) ? $data['fk_Products'] : ''; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="fk_Users">User<span> *</span></label>
            <select id="fk_Users" name="fk_Users" class="form-select">
                <option value="">Select User</option>
                <?php
                $users = $usersObj->getUsersList();
                foreach($users as $val) {
                    $selected = (isset($data['fk_Users']) && $data['fk_Users'] == $val['id']) ? "selected" : "";
                    echo "<option value='{$val['id']}' {$selected}>{$val['username']}</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="rating">Rating (1-5)<span> *</span></label>
        <input type="number" id="rating" name="rating" class="form-control" min="1" max="5" value="<?php echo isset($data['rating']) ? $data['rating'] : ''; ?>">
    </div>

    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea id="comment" name="comment" class="form-control" rows="3"><?php echo isset($data['comment']) ? $data['comment'] : ''; ?></textarea>
    </div>

    <?php if(isset($data['id'])) { ?><input type="hidden" name="id" value="<?php echo $data['id']; ?>" /><?php } ?>
    <p class="required-note">* marked fields are required</p>
    <input type="submit" class="btn btn-primary w-25" name="submit" value="Save Review">
</form>