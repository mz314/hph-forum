<?php

require_once 'factory.php';

class model {

    protected $db, $_name, $table;

    public function __construct() {
        $this->table_name = str_ireplace("Model", "", get_class($this));
        $this->db = factory::getDB()->getDB();
    }

    public function get($where = "1") {
        $sql = "select * from {$this->table_name} where $where";
        $this->db->exec($sql);
        $res = $this->db->getRows();
        return $res;
    }

}
