<?php
class roles {
    private $roles_table = '';

    public function __construct() {
        $this->roles_table = config::DB_PREFIX . 'Roles';
    }

    public function getRole($id) {
        $id = mysql::escapeFieldForSQL($id);
        $query = "SELECT * FROM `{$this->roles_table}` WHERE `id`='{$id}'";
        $data = mysql::select($query);
        return $data[0];
    }

    public function getRolesList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limit = mysql::escapeFieldForSQL($limit);
            $limitOffsetString .= " LIMIT {$limit}";
            if(isset($offset)) {
                $offset = mysql::escapeFieldForSQL($offset);
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }
        $query = "SELECT * FROM `{$this->roles_table}` ORDER BY `id` ASC {$limitOffsetString}";
        return mysql::select($query);
    }

    public function getRolesCount() {
        $query = "SELECT COUNT(`id`) as `amount` FROM `{$this->roles_table}`";
        $data = mysql::select($query);
        return $data[0]['amount'];
    }

    public function insertRole($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);
        $query = "INSERT INTO `{$this->roles_table}` (`name`) VALUES ('{$data['name']}')";
        mysql::query($query);
    }

    public function updateRole($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);
        $query = "UPDATE `{$this->roles_table}` SET `name`='{$data['name']}' WHERE `id`='{$data['id']}'";
        mysql::query($query);
    }

    public function deleteRole($id) {
        $id = mysql::escapeFieldForSQL($id);
        $query = "DELETE FROM `{$this->roles_table}` WHERE `id`='{$id}'";
        mysql::query($query);
    }
}