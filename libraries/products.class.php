<?php
/**
 * Product editing class
 */

class products {

    private $products_table = '';
    private $categories_table = '';
    private $order_items_table = '';

    public function __construct() {
        $this->products_table = config::DB_PREFIX . 'Products';
        $this->categories_table = config::DB_PREFIX . 'Categories';
        $this->order_items_table = config::DB_PREFIX . 'Order_Items';
    }

    public function getProduct($id) {
        $id = mysql::escapeFieldForSQL($id);

        $query = "  SELECT *
                FROM `{$this->products_table}`
                WHERE `id`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    public function lastProductID(){
        $query = "SELECT * FROM {$this->products_table} ORDER BY `id` DESC LIMIT 1";
        mysql::query($query);
        $data = mysql::select($query);
        if(!empty($data)) {
            return $data[0]['id'];
        }
        return 0;
    }

    public function updateProduct($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "  UPDATE `{$this->products_table}`
                SET    `name`='{$data['name']}',
                      `description`='{$data['description']}',
                      `price`='{$data['price']}',
                      `stock_quantity`='{$data['stock_quantity']}',
                      `sku`='{$data['sku']}',
                      `color`='{$data['color']}',
                      `device_model`='{$data['device_model']}',
                      `fk_Categories`='{$data['fk_Categories']}'
                WHERE `id`='{$data['id']}'";
        mysql::query($query);
    }

    public function insertProduct($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "  INSERT INTO `{$this->products_table}` 
                         (
                            `name`,
                            `description`,
                            `price`,
                            `stock_quantity`,
                            `sku`,
                            `color`,
                            `device_model`,
                            `fk_Categories`
                         ) 
                         VALUES
                         (
                            '{$data['name']}',
                            '{$data['description']}',
                            '{$data['price']}',
                            '{$data['stock_quantity']}',
                            '{$data['sku']}',
                            '{$data['color']}',
                            '{$data['device_model']}',
                            '{$data['fk_Categories']}'
                         )";
        mysql::query($query);
    }

    public function getProductList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limit = mysql::escapeFieldForSQL($limit);
            $limitOffsetString .= " LIMIT {$limit}";
        }
        if(isset($offset)) {
            $offset = mysql::escapeFieldForSQL($offset);
            $limitOffsetString .= " OFFSET {$offset}";
        }

        $query = "  SELECT `{$this->products_table}`.*,
                      `{$this->categories_table}`.`name` AS `category_name`
                FROM `{$this->products_table}`
                   LEFT JOIN `{$this->categories_table}`
                      ON `{$this->products_table}`.`fk_Categories`=`{$this->categories_table}`.`id`" . $limitOffsetString;
        return mysql::select($query);
    }

    public function getProductListCount() {
        $query = "  SELECT COUNT(`id`) AS `amount` FROM `{$this->products_table}`";
        $data = mysql::select($query);
        return $data[0]['amount'];
    }

    public function deleteProduct($id) {
        $id = mysql::escapeFieldForSQL($id);
        $query = "DELETE FROM `{$this->products_table}` WHERE `id`='{$id}'";
        mysql::query($query);
    }

    public function getOrderItemCountOfProduct($id) {
        $id = mysql::escapeFieldForSQL($id);
        $query = "SELECT COUNT(`id`) AS `amount` FROM `{$this->order_items_table}` WHERE `fk_Products`='{$id}'";
        $data = mysql::select($query);
        return $data[0]['amount'];
    }
    public function getProductReviews($productId) {
        $productId = mysql::escapeFieldForSQL($productId);
        $reviews_table = config::DB_PREFIX . 'Reviews';
        $users_table = config::DB_PREFIX . 'Users';

        $query = "SELECT 
                    r.*, 
                    u.username 
                  FROM `{$reviews_table}` r
                  LEFT JOIN `{$users_table}` u ON r.fk_Users = u.id
                  WHERE r.fk_Products = '{$productId}'
                  ORDER BY r.id DESC";

        return mysql::select($query);
    }
}