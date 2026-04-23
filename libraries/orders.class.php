<?php
/**
 * Orders management class
 */
class orders {
    private $orders_table = '';
    private $order_items_table = '';
    private $users_table = '';
    private $products_table = '';

    public function __construct() {
        $this->orders_table = config::DB_PREFIX . 'Orders';
        $this->order_items_table = config::DB_PREFIX . 'Order_Items';
        $this->users_table = config::DB_PREFIX . 'Users';
        $this->products_table = config::DB_PREFIX . 'Products';
    }

    public function getOrder($id) {
        $id = mysql::escapeFieldForSQL($id);
        $query = "SELECT *, `total_amount` AS `total_price` FROM `{$this->orders_table}` WHERE `id`='{$id}'";
        $data = mysql::select($query);
        return $data[0];
    }

    public function getOrderList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limit = mysql::escapeFieldForSQL($limit);
            $limitOffsetString .= " LIMIT {$limit}";
            if(isset($offset)) {
                $offset = mysql::escapeFieldForSQL($offset);
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "SELECT 
                `{$this->orders_table}`.`id`, 
                `{$this->orders_table}`.`order_date`, 
                `{$this->orders_table}`.`total_amount`,
                `{$this->orders_table}`.`status`,
                `{$this->orders_table}`.`payment_method`,
                `{$this->users_table}`.`username` 
              FROM `{$this->orders_table}`
              LEFT JOIN `{$this->users_table}` ON `{$this->orders_table}`.`fk_Users` = `{$this->users_table}`.`id`
              ORDER BY `id` DESC {$limitOffsetString}";

        return mysql::select($query);
    }

    public function getOrderListCount() {
        $query = "SELECT COUNT(`id`) as `amount` FROM `{$this->orders_table}`";
        $data = mysql::select($query);
        return $data[0]['amount'];
    }

    public function insertOrder($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);
        $query = "INSERT INTO `{$this->orders_table}` 
                    (`order_date`, `total_amount`, `status`, `shipping_address`, `payment_method`, `fk_Users`) 
                  VALUES 
                    ('{$data['order_date']}', '{$data['total_price']}', '{$data['status']}', '{$data['shipping_address']}', '{$data['payment_method']}', '{$data['fk_Users']}')";
        mysql::query($query);
        return mysql::getLastInsertedId();
    }

    public function updateOrder($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);
        $query = "UPDATE `{$this->orders_table}` 
                  SET `status`='{$data['status']}', `total_amount`='{$data['total_price']}', `shipping_address`='{$data['shipping_address']}', `payment_method`='{$data['payment_method']}', `fk_Users`='{$data['fk_Users']}' 
                  WHERE `id`='{$data['id']}'";
        mysql::query($query);
    }

    public function updateOrderItems($orderId, $products, $quantities) {
        $orderId = mysql::escapeFieldForSQL($orderId);
        // Clear old items first
        mysql::query("DELETE FROM `{$this->order_items_table}` WHERE `fk_Orders`='{$orderId}'");

        if(!empty($products)) {
            foreach($products as $key => $productId) {
                if($productId > 0) {
                    $qty = mysql::escapeFieldForSQL($quantities[$key]);
                    $pId = mysql::escapeFieldForSQL($productId);
                    mysql::query("INSERT INTO `{$this->order_items_table}` (`quantity`, `fk_Orders`, `fk_Products`) 
                                  VALUES ('{$qty}', '{$orderId}', '{$pId}')");
                }
            }
        }
    }
    public function deleteOrder($id) {
        $id = mysql::escapeFieldForSQL($id);
        mysql::query("DELETE FROM `{$this->order_items_table}` WHERE `fk_Orders`='{$id}'");
        mysql::query("DELETE FROM `{$this->orders_table}` WHERE `id`='{$id}'");
    }

    public function getOrderItems($orderId) {
        $orderId = mysql::escapeFieldForSQL($orderId);
        $query = "SELECT `{$this->order_items_table}`.*, `{$this->products_table}`.`name` as `product_name`
                  FROM `{$this->order_items_table}`
                  LEFT JOIN `{$this->products_table}` ON `{$this->order_items_table}`.`fk_Products` = `{$this->products_table}`.`id`
                  WHERE `fk_Orders`='{$orderId}'";
        return mysql::select($query);
    }
}