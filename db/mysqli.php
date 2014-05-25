<?php

require_once 'dbClass.php';

class mysqliDB extends dbClass {

    private $conn, $result, $rows;

    public function exec($sql) {
        $this->result = mysqli_query($this->conn, $sql);
        if ($this->result) {
            return true;
        } else {
            return false;
        }
    }

    public function getRows() {
//      if($this->rows) {
//          mysqli_free_result($this->rows);
//          $this->rows=null;
//      }

        if ($this->mode == dbClass::MODE_ASSOC) {
            $this->rows = mysqli_fetch_all($this->result, MYSQLI_ASSOC);
            mysqli_free_result($this->result);
        } else {
            $this->rows=array();
            while($res=  mysqli_fetch_object($this->result)) {
                $this->rows[]=$res;
            }
        }
        return $this->rows;
    }

    protected function connect() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
    }

    protected function disconnect() {
        mysqli_close($this->conn);
    }

}