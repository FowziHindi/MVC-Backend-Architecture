<?php
/**
 * Categories editing class
 */

class categories {

    private $categories_table = '';
    private $products_table = '';

    public function __construct() {
        $this->categories_table = config::DB_PREFIX . 'Categories';
        $this->products_table = config::DB_PREFIX . 'Products';
    }

    public function lastCategoryID(){
        $query = "SELECT * FROM {$this->categories_table} ORDER BY `id` DESC LIMIT 1";
        mysql::query($query);
        $data = mysql::select($query);
        if(!empty($data)) {
            return $data[0]['id'];
        }
        return 0;
    }

    public function getCategory($id) {
        $id = mysql::escapeFieldForSQL($id);

        $query = "  SELECT *
                FROM {$this->categories_table}
                WHERE `id`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    public function getCategoryList($limit = null, $offset = null) {
        if($limit) {
            $limit = mysql::escapeFieldForSQL($limit);
        }
        if($offset) {
            $offset = mysql::escapeFieldForSQL($offset);
        }

        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if(isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT *
                FROM {$this->categories_table}{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    public function getCategoryListCount() {
        $query = "  SELECT COUNT(`id`) as `amount`
                FROM {$this->categories_table}";
        $data = mysql::select($query);

        return $data[0]['amount'];
    }

    public function insertCategory($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "  INSERT INTO {$this->categories_table}
                         (
                            `name`,
                            `slug`,
                            `display_order`,
                            `image_url`,
                            `is_active`
                         )
                         VALUES
                         (
                            '{$data['name']}',
                            '{$data['slug']}',
                            '{$data['display_order']}',
                            '{$data['image_url']}',
                            '{$data['is_active']}'
                         )";
        mysql::query($query);
    }

    public function updateCategory($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "  UPDATE {$this->categories_table}
                SET    `name`='{$data['name']}',
                       `slug`='{$data['slug']}',
                       `display_order`='{$data['display_order']}',
                       `image_url`='{$data['image_url']}',
                       `is_active`='{$data['is_active']}'
                WHERE `id`='{$data['id']}'";
        mysql::query($query);
    }

    public function deleteCategory($id) {
        $id = mysql::escapeFieldForSQL($id);

        $query = "  DELETE FROM {$this->categories_table}
                WHERE `id`='{$id}'";
        mysql::query($query);
    }

    public function getProductCountOfCategory($id) {
        $id = mysql::escapeFieldForSQL($id);

        $query = "  SELECT COUNT({$this->products_table}.`id`) AS `amount`
                FROM {$this->categories_table}
                   INNER JOIN {$this->products_table}
                      ON {$this->categories_table}.`id`={$this->products_table}.`fk_Categories`
                WHERE {$this->categories_table}.`id`='{$id}'";
        $data = mysql::select($query);

        return $data[0]['amount'];
    }
}