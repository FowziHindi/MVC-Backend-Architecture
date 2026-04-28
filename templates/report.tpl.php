<div id="actions"></div>
<div class="float-clear"></div>

<div class="card mb-4">
    <div class="card-header bg-dark text-white text-center">
        <h5 class="mb-0">Filter Report</h5>
    </div>
    <div class="card-body">
        <form action="" method="get" class="row g-3 align-items-end">
            <input type="hidden" name="module" value="report">
            <input type="hidden" name="action" value="list">

            <div class="col-md-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-select">
                    <option value="">- All Categories -</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo $cat['id']; ?>" <?php if ($categoryId == $cat['id']) echo 'selected'; ?>>
                            <?php echo $cat['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3">
                <label for="min_price" class="form-label">Min Product Price ($)</label>
                <input type="number" step="0.01" name="min_price" id="min_price" class="form-control" value="<?php echo htmlspecialchars($minPrice); ?>">
            </div>

            <div class="col-md-3">
                <label for="date_from" class="form-label">Orders From Date</label>
                <input type="date" name="date_from" id="date_from" class="form-control" value="<?php echo htmlspecialchars($dateFrom); ?>">
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100"><i class="fa fa-filter"></i> Apply Filters</button>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover mb-0">
        <thead class="table-dark">
        <tr>
            <th>Category</th>
            <th>Product</th>
            <th>SKU</th>
            <th>Total Orders</th>
            <th>Items Sold</th>
            <th>Avg Purchase Price</th>
            <th>Max in One Order</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($reportData)): ?>
            <?php foreach ($reportData as $row): ?>
                <tr>
                    <td><?php echo $row['Category_Name']; ?></td>
                    <td><?php echo $row['Product_Name']; ?></td>
                    <td><?php echo $row['SKU']; ?></td>
                    <td><?php echo $row['Total_Orders']; ?></td>
                    <td><?php echo $row['Items_Sold']; ?></td>
                    <td>$<?php echo $row['Avg_Purchase_Price']; ?></td>
                    <td><?php echo $row['Max_Items_In_One_Order']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center py-4">No data found matching your filters.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?php if (!empty($totals)): ?>
    <div class="mt-5 card shadow-sm mx-auto" style="max-width: 800px;">
        <div class="card-header bg-secondary text-white text-center">
            <h6 class="mb-0">Report Summary (Grand Totals)</h6>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0 text-center">
                <thead class="table-light">
                <tr>
                    <th>Total Orders</th>
                    <th>Total Items Sold</th>
                    <th>Average Price</th>
                    <th>Highest Qty in Order</th>
                </tr>
                </thead>
                <tbody>
                <tr class="fw-bold">
                    <td><?php echo $totals['Grand_Total_Orders']; ?></td>
                    <td><?php echo $totals['Grand_Items_Sold']; ?></td>
                    <td>$<?php echo $totals['Grand_Avg_Price']; ?></td>
                    <td><?php echo $totals['Grand_Max_Items']; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>