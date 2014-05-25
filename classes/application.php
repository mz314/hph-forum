<?php
require_once APP_WD.'/config.php';
require_once 'controller.php';
require_once 'model.php';



class application extends controller {
    
    protected $dbConn;
   
    
    protected function importController($name) {
        $cname=$name.'Controller';
        $cfile=APP_WD.'/controllers/'.$cname.'.php'; 
        
        if (!file_exists($cfile)) {
            throw new Exception("No such controller");
        } else {
            require_once $cfile;
            return new $cname();
        }
    }


    public function run() {
        session_start();
        $controller_var=request::getVar('controller','index');
        $action=request::getVar('action','default');
        $action.='Action';
        $controller=$this->importController($controller_var);
        $controller->{$action}();
    }
}
