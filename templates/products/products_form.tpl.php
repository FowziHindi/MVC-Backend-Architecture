<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?module=<?php echo $module; ?>&action=list">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php if(!empty($id)) echo "Edit Product"; else echo "New Product"; ?></li>
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
        <label for="name">Product Name<span> *</span></label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
    </div>

    <div class="form-group">
        <label for="fk_Categories">Category<span> *</span></label>
        <select id="fk_Categories" name="fk_Categories" class="form-select form-control">
            <option value="-1">Select a category</option>
            <?php
            $categories = $categoriesObj->getCategoryList();
            foreach($categories as $val) {
                $selected = (isset($data['fk_Categories']) && $data['fk_Categories'] == $val['id']) ? " selected='selected'" : "";
                echo "<option{$selected} value='{$val['id']}'>{$val['name']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control"><?php echo isset($data['description']) ? $data['description'] : ''; ?></textarea>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="price">Price<span> *</span></label>
            <input type="text" id="price" name="price" class="form-control" value="<?php echo isset($data['price']) ? $data['price'] : ''; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="stock_quantity">Stock Quantity<span> *</span></label>
            <input type="number" id="stock_quantity" name="stock_quantity" class="form-control" value="<?php echo isset($data['stock_quantity']) ? $data['stock_quantity'] : ''; ?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="sku">SKU<span> *</span></label>
            <input type="text" id="sku" name="sku" class="form-control" value="<?php echo isset($data['sku']) ? $data['sku'] : ''; ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="color">Color</label>
            <input type="text" id="color" name="color" class="form-control" value="<?php echo isset($data['color']) ? $data['color'] : ''; ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="device_model">Model</label>
            <input type="text" id="device_model" name="device_model" class="form-control" value="<?php echo isset($data['device_model']) ? $data['device_model'] : ''; ?>">
        </div>
    </div>

    <?php if(isset($data['id'])) { ?>
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
    <?php } ?>

    <p class="required-note">* marked fields are required</p>

    <input type="submit" class="btn btn-primary w-25" name="submit" value="Save Product">
</form>

<?php if(isset($data['id'])) { ?>
    <hr class="my-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Product Reviews</h4>
        <a href="index.php?module=reviews&action=create&fk_Products=<?php echo $data['id']; ?>" class="btn btn-success">Add New Review</a>
    </div>

    <table class="table">
        <tr>
            <th>User</th>
            <th>Rating</th>
            <th>Comment</th>
            <th></th>
        </tr>
        <?php if(!empty($productReviews)) {
            foreach($productReviews as $review) {
                echo "<tr>
                        <td>{$review['username']}</td>
                        <td>{$review['rating']} / 5</td>
                        <td>{$review['comment']}</td>
                        <td class='d-flex flex-row-reverse gap-2'>
                            <a href='index.php?module=reviews&action=edit&id={$review['id']}'>Edit</a>
                            <a href='#' onclick='showConfirmDialog(\"reviews\", \"{$review['id']}\"); return false;'>Remove</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4' class='text-center'>No reviews for this product yet.</td></tr>";
        } ?>
    </table>
<?php } ?>