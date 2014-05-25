<?php
class dbConn {
    private $db;
    public function __construct() {
        $class_file=APP_WD.'/db/'.DB_LIB.'.php';
        require_once $class_file;
        $dbname=DB_LIB.'DB';
        $this->db=new $dbname();
    }
    
    function getDB() {
        return $this->db;
    }
}