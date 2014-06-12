<?php

require_once 'dbClass.php';

class oracleDB extends dbClass {
    private $conn, $result, $rows;
    
    function connect() {
       $this->conn = oci_connect($this->user,  $this->password, 'localhost/XE'); 
#$this->host, ,, $this->database
    }
    
    function insertId() {
        $sql="select id.currval from dual";
        $this->exec($sql);
        $r=$this->getRow();
        var_dump($r);
    }
    
    function getRows() {
        $this->rows=array(); 
        while($res=  oci_fetch_assoc($this->result)) {
             if($this->mode!=dbClass::MODE_ASSOC) {   
                  $c=new stdClass();
                 foreach($res as $k=>$v) {
                    $c->{strtolower($k)}=$v;
                 }
                 $res=$c;
             }
             $this->rows[]=$res;
             
            }
      
            oci_free_statement($this->result);
            return $this->rows;
    }
    
    function exec($sql) {
        #echo $sql;
        
        $this->result=oci_parse($this->conn, $sql)  ;     
//$this->result = mysqli_query($this->conn, $sql);
         return oci_execute($this->result);
                
    }
    
    
    function disconnect() {
        
    }
}