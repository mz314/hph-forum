<?php

abstract class dataAbstract {

    abstract function actualInit($req);

    function validate($req) { //not abstract, since some data might not require validation
        return false;
    }
    
    function __construct($req) {
        $this->actualInit($req);
    }

   function toUpdate() {
      $sql=" set ";
       $arr = (array) $this;
      
        $i = 0;
        foreach ($arr as $k => $v) {
            $sql.="$k='$v'";
            
            if ($i < count($arr) - 1) {
                $sql.=',';
            }
            $i++;
        }
      
        return $sql;  
   }
    
    function toInsert() {
        $arr = (array) $this;
        $cols = '';
        $rows = '';
        $i = 0;
        foreach ($arr as $k => $v) {
            $cols.=$k;
            $rows.="'" . $v . "'";
            if ($i < count($arr) - 1) {
                $cols.=",";
                $rows.=",";
            }
            $i++;
        }
        $sql = '(' . $cols . ') values(' . $rows . ')';
        return $sql;
    }

}