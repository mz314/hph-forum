<?php

abstract class dbClass {

    protected $host, $user, $password, $database,$query,
            $mode;

    const MODE_OBJECT = 1, MODE_ASSOC = 0;

    abstract protected function connect();

    abstract protected function disconnect();

    public function __construct() {
        $this->host=DB_HOST;
        $this->user=DB_USER;
        $this->password=DB_PASS;
        $this->database=DB;
        $this->mode=  dbClass::MODE_OBJECT;
        $this->connect();
    }

    public function __destruct() {
        $this->disconnect();
    }

    public function setMode($mode) {
        $this->mode = $mode;
    }
   
    public function q($data) {
        return "'".$data."'";
    }
    
    public function getRow() {
        $rows=$this->getRows();
        if($rows && count($rows)) {
            return $rows[0];
        } else {
            return null;
        }
        
    }
    
  


    abstract public function exec($sql);

    abstract public function getRows();
}
