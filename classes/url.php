<?php

class url {
 protected $_server_url,$_url_root;
    function __construct() {
     $this->_server_url=$_SERVER['HTTP_HOST'];
     $this->_url_root=$_SERVER['REQUEST_URI'];
     }
     
     function getHost() {
         return $this->_server_url;
     }
     
     function getRoot() {
         return $this->_url_root;
     }
    
     function makeGet($params,$question=true) {
         $get="";
         foreach($params as $name=>$param) {
             $get.=$name.'='.$param.'&';
         }
         if($question) {
             $get='?'.$get;
         }
         return $get;
     }
}