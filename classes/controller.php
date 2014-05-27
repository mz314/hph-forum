<?php

require_once 'request.php';
require_once 'factory.php';

class controller {

    protected $model,$_name,$req;
    
    public function __construct() {
        $this->_name= str_ireplace("Controller", "", get_class($this));
        $this->req=  factory::getRequest();
        $this->model=  factory::getModel($this->_name);
    }

    

    protected function renderView($name, $raw = false) {
        $title = "\n";
        $head = "\n";
        $fn = APP_WD . '/views/' .$this->_name . '/' . $name . '.php';
        ob_start();
        require $fn;
        $body_html = "\n".ob_get_clean()."\n";
        if (!$raw) {
            ob_start();
            require APP_WD . '/views/common/index.php';
            $layout_html = ob_get_clean();
            echo $layout_html;
        } else {
            echo $body_html;
        }
    }
    
    protected function redirect($controller,$action='default') {
       $url_f=factory::getURL();
       $url=$url_f->getRoot().$url_f->makeGet(array('controller'=>$controller,'action'=>$action));
       header("Location: ".$url.'?');
       
    }
    
    function defaultAction() {
        
    }

}
