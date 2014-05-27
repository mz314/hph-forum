<?php

require_once 'factory.php';

class model {

    protected $db, $_name, $table;

    public function __construct() {
        $this->table_name = str_ireplace("Model", "", get_class($this));
        $this->db = factory::getDB()->getDB();
    }

    protected function mkGetSQL($where) {
        $sql = "select * from {$this->table_name} where $where";
        return $sql;
    }
    
    public function get($where = "1") {
        $sql = $this->mkGetSQL($where);
        $this->db->exec($sql);
        $res = $this->db->getRows();
        return $res;
    }

}
