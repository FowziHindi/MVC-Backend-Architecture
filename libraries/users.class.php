<?php
/**
 * User editing class
 */

class users {

    private $users_table = '';
    private $roles_table = '';
    private $orders_table = '';

    public function __construct() {
        $this->users_table = config::DB_PREFIX . 'Users';
        $this->roles_table = config::DB_PREFIX . 'Roles';
        $this->orders_table = config::DB_PREFIX . 'Orders';
    }

    /**
     * User selection
     * @param type $id
     * @return type
     */
    public function getUser($id) {
        $id = mysql::escapeFieldForSQL($id);

        $query = "  SELECT *
                FROM `{$this->users_table}`
                WHERE `id`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    /**
     * User list selection
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getUsersList($limit = null, $offset = null) {
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

        $query = "  SELECT `{$this->users_table}`.*, `{$this->roles_table}`.`name` AS `role_name`
                FROM `{$this->users_table}`
                   LEFT JOIN `{$this->roles_table}`
                      ON `{$this->users_table}`.`fk_Roles`=`{$this->roles_table}`.`id`" . $limitOffsetString;
        $data = mysql::select($query);

        return $data;
    }

    /**
     * User count calculation
     * @return type
     */
    public function getUsersListCount() {
        $query = "  SELECT COUNT(`id`) as `amount`
                FROM `{$this->users_table}`";
        $data = mysql::select($query);

        return $data[0]['amount'];
    }

    /**
     * User removal
     * @param type $id
     */
    public function deleteUser($id) {
        $id = mysql::escapeFieldForSQL($id);

        $query = "  DELETE FROM `{$this->users_table}`
                WHERE `id`='{$id}'";
        mysql::query($query);
    }

    /**
     * User update
     * @param type $data
     */
    public function updateUser($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "  UPDATE `{$this->users_table}`
                SET    `username`='{$data['username']}',
                      `email`='{$data['email']}',
                      `password_hash`='{$data['password_hash']}',
                      `is_active`='{$data['is_active']}',
                      `fk_Roles`='{$data['fk_Roles']}'
                WHERE `id`='{$data['id']}'";
        mysql::query($query);
    }

    /**
     * User insertion
     * @param type $data
     */
    public function insertUser($data) {
        $data = mysql::escapeFieldsArrayForSQL($data);

        $query = "  INSERT INTO `{$this->users_table}`
                         (
                            `username`,
                            `email`,
                            `password_hash`,
                            `created_at`,
                            `is_active`,
                            `fk_Roles`
                         ) 
                         VALUES
                         (
                            '{$data['username']}',
                            '{$data['email']}',
                            '{$data['password_hash']}',
                            '{$data['created_at']}',
                            '{$data['is_active']}',
                            '{$data['fk_Roles']}'
                         )";
        mysql::query($query);
    }

    /**
     * Amount of orders the user has placed
     * @param type $id
     * @return type
     */
    public function getOrderCountOfUser($id) {
        $id = mysql::escapeFieldForSQL($id);

        $query = "  SELECT COUNT(`{$this->orders_table}`.`id`) AS `amount`
                FROM `{$this->users_table}`
                   INNER JOIN `{$this->orders_table}`
                      ON `{$this->users_table}`.`id`=`{$this->orders_table}`.`fk_Users`
                WHERE `{$this->users_table}`.`id`='{$id}'";
        $data = mysql::select($query);

        return $data[0]['amount'];
    }

    /**
     * Selection of roles list
     * @return type
     */
    public function getRolesList() {
        $query = "  SELECT *
                FROM `{$this->roles_table}`";
        $data = mysql::select($query);

        return $data;
    }
}