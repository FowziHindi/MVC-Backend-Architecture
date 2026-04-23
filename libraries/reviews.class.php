<?php
class reviews {
    private $reviews_table = '';
    private $users_table = '';
    private $products_table = '';

    public function __construct() {
        $this->reviews_table = config::DB_PREFIX . 'Reviews';
        $this->users_table = config::DB_PREFIX . 'Users';
        $this->products_table = config::DB_PREFIX . 'Products';
    }

    public function getReview($id) {
        $id = mysql::escapeFieldForSQL($id);
        $query = "SELECT * FROM `{$this->reviews_table}` WHERE `id`='{$id}'";
        $data = mysql::select($query);
        return $data[0];
    }

    public function getReviewList($limit = null, $offset = null) {
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
                    `{$this->reviews_table}`.*,
                    `{$this->users_table}`.`username`,
                    `{$this->products_table}`.`name` AS `product_name`
                  FROM `{$this->reviews_table}`
                  LEFT JOIN `{$this->users_table}` ON `{$this->reviews_table}`.`fk_Users` = `{$this->users_table}`.`id`
                  LEFT JOIN `{$this->products_table}` ON `{$this->reviews_table}`.`fk_Products` = `{$this->products_table}`.`id`
                  ORDER BY `{$this->reviews_table}`.`id` DESC {$limitOffsetString}";
        return mysql::select($query);
    }

    public function getReviewCount() {
        $query = "SELECT COUNT(`id`) as `amount` FROM `{$this->reviews_table}`";
        $data = mysql::select($query);
        return $data[0]['amount'];
    }

    public function insertReview($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);
        $query = "INSERT INTO `{$this->reviews_table}` (`rating`, `comment`, `fk_Users`, `fk_Products`) 
                  VALUES ('{$data['rating']}', '{$data['comment']}', '{$data['fk_Users']}', '{$data['fk_Products']}')";
        mysql::query($query);
    }

    public function updateReview($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);
        $query = "UPDATE `{$this->reviews_table}` 
                  SET `rating`='{$data['rating']}', `comment`='{$data['comment']}', `fk_Users`='{$data['fk_Users']}', `fk_Products`='{$data['fk_Products']}' 
                  WHERE `id`='{$data['id']}'";
        mysql::query($query);
    }

    public function deleteReview($id) {
        $id = mysql::escapeFieldForSQL($id);
        $query = "DELETE FROM `{$this->reviews_table}` WHERE `id`='{$id}'";
        mysql::query($query);
    }
}