<?php

class request {
   function getVar($name,$default=null,$var=null) {
        if(!$var) {
            $var=$_REQUEST;
        }
        if (array_key_exists($name, $var)) {
            return $var[$name];
        } else {
            return $default;
        }
    }
    
    function isPost() {
  
        return (isset($_POST) && count($_POST)) ;
    }
    
    function getPost($name,$default=null) {
        return $this->getVar($name,$default,$_POST);
    }
    
    function setSession($name,$value) {
        $_SESSION[$name]=$value;
    }
    
    function getSession($name,$default=null) {
        return $this->getVar($name,$default,$_SESSION);
    }
}
