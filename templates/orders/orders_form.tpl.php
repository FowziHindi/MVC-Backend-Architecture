<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?module=<?php echo $module; ?>&action=list">Orders</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php if(!empty($id)) echo "Edit Order"; else echo "New Order"; ?></li>
    </ol>
</nav>

<?php if($formErrors != null) { ?>
    <div class="alert alert-danger" role="alert">
        Please fix the following errors:
        <?php echo $formErrors; ?>
    </div>
<?php } ?>

<form action="" method="post" class="d-grid gap-3">
    <h4 class="mt-3">Order Information</h4>

    <div class="form-group">
        <label for="fk_Users">Customer<span> *</span></label>
        <select id="fk_Users" name="fk_Users" class="form-select form-control">
            <option value="-1">Select a customer</option>
            <?php
            $users = $usersObj->getUsersList();
            foreach($users as $val) {
                $selected = (isset($data['fk_Users']) && $data['fk_Users'] == $val['id']) ? " selected='selected'" : "";
                echo "<option{$selected} value='{$val['id']}'>{$val['username']} ({$val['email']})</option>";
            }
            ?>
        </select>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="status">Status<span> *</span></label>
            <select id="status" name="status" class="form-select form-control">
                <option value="Pending" <?php echo (isset($data['status']) && $data['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="Shipped" <?php echo (isset($data['status']) && $data['status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                <option value="Delivered" <?php echo (isset($data['status']) && $data['status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                <option value="Cancelled" <?php echo (isset($data['status']) && $data['status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="total_price">Total Price (€)<span> *</span></label>
            <input type="text" id="total_price" name="total_price" class="form-control" value="<?php echo isset($data['total_price']) ? $data['total_price'] : ''; ?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="shipping_address">Shipping Method<span> *</span></label>
            <input type="text" id="shipping_address" name="shipping_address" class="form-control" value="<?php echo isset($data['shipping_address']) ? $data['shipping_address'] : ''; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="payment_method">Payment Method<span> *</span></label>
            <select id="payment_method" name="payment_method" class="form-select form-control">
                <option value="Debit Card" <?php echo (isset($data['payment_method']) && $data['payment_method'] == 'Debit Card') ? 'selected' : ''; ?>>Debit Card</option>
                <option value="Credit Card" <?php echo (isset($data['payment_method']) && $data['payment_method'] == 'Credit Card') ? 'selected' : ''; ?>>Credit Card</option>
                <option value="PayPal" <?php echo (isset($data['payment_method']) && $data['payment_method'] == 'PayPal') ? 'selected' : ''; ?>>PayPal</option>
                <option value="Bank Transfer" <?php echo (isset($data['payment_method']) && $data['payment_method'] == 'Bank Transfer') ? 'selected' : ''; ?>>Bank Transfer</option>
            </select>
        </div>
    </div>

    <h4 class="mt-4">Order Items</h4>
    <div class="form-group">
        <div class="row mb-2">
            <div class="col-6"><strong>Product</strong></div>
            <div class="col-2"><strong>Quantity</strong></div>
            <div class="col-4"></div>
        </div>
        <div class="childRowContainer">
            <?php
            $items = array();
            if(!empty($id)) {
                $items = $ordersObj->getOrderItems($id);
            }

            if(empty($items)) {
                $items = array(array('fk_Products' => '', 'quantity' => '1'));
            }

            foreach($items as $item) {
                ?>
                <div class="childRow row mb-2">
                    <div class="col-6">
                        <select name="fk_Products[]" class="form-select form-control">
                            <option value="-1">Select product</option>
                            <?php
                            $products = $productsObj->getProductList();
                            foreach($products as $p) {
                                $selected = ($item['fk_Products'] == $p['id']) ? "selected" : "";
                                echo "<option value='{$p['id']}' {$selected}>{$p['name']} ({$p['price']} €)</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-2">
                        <input type="number" name="quantity[]" class="form-control" value="<?php echo $item['quantity']; ?>" />
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-danger removeOrderItem">Remove</button>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="mt-2">
            <button type="button" class="btn btn-secondary addOrderItem">Add Item</button>
        </div>
    </div>

    <?php if(isset($data['id'])) { ?>
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
    <?php } ?>

    <p class="required-note">* marked fields are required</p>

    <input type="submit" class="btn btn-primary w-25" name="submit" value="Save Order">
</form>

<script>
    $(document).ready(function() {
        $('.addOrderItem').click(function(e) {
            e.preventDefault();
            var row = $('.childRow:first').clone();
            row.find('select').val('-1');
            row.find('input').val('1');
            $('.childRowContainer').append(row);
        });

        $(document).on('click', '.removeOrderItem', function(e) {
            e.preventDefault();
            if($('.childRow').length > 1) {
                $(this).closest('.childRow').remove();
            } else {
                $(this).closest('.childRow').find('select').val('-1');
                $(this).closest('.childRow').find('input').val('1');
            }
        });
    });
</script>