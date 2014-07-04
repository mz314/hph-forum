<?php

require_once 'request.php';
require_once 'factory.php';

class controller {

    protected $model,$_name,$req,$uses_css=array(),
            $uses_js=array(),$css_html,$js_html;
    
    public function __construct() {
        $this->_name= str_ireplace("Controller", "", get_class($this));
        $this->req=  factory::getRequest();
        $this->model=  factory::getModel($this->_name);
        $this->view_v=$this;
    }

    //TODO these 2
    protected function addJS($fn,$dir='static/js') {
      $this->js_html.='<script src="'.$dir.'/'.$fn.'"></script>';  
    }
    
    
    protected function addCSS($fn,$dir='static/css') {
     $this->css_html.='<link rel="stylesheet" href="'.factory::getURL()->getUrlRoot().$dir.'/'.$fn.'" />';
    
     
    }
    
    protected function jsonReply($code,$data=null) {
        $ret=new stdClass();
        $ret->code=$code;
        $ret->data=$data;
        ob_clean();
        echo json_encode($ret);
    }
    
    private function translation($output) {
        $trans=array();
        preg_match_all("{{(.*)}}", $output,$trans);
        foreach($trans as $tx) {
            foreach($tx as $t) {
            $dt=$t;
            $dt=  str_replace("{{", '', $dt);
            $dt=  str_replace("}}", '', $dt);
            $dt=t($dt);
            $output=  str_replace($t, $dt, $output);
            }
        }
        return $output;
    }
    
    protected function renderView($name, $raw = false) {
       
        $output='';
        foreach($this->uses_js as $js) {
            $this->addJS($js);
        }
        foreach($this->uses_css as $css) {
            $this->addCSS($css);
        }
        $root=  factory::getURL()->getUrlRoot();
        $title = "\n";
        $head = $this->css_html.$this->js_html;
        $fn = APP_WD . '/views/' .$this->_name . '/' . $name . '.php';
        ob_start();
        require $fn;
        $body_html = "\n".ob_get_clean()."\n";
        if (!$raw) {
            ob_start();
            $menu=  factory::getMenu()->render();
            
            require APP_WD . '/views/common/index.php';
            $layout_html = ob_get_clean();
            $output=$layout_html;
        } else {
            $output=$body_html;
        }
        $output=$this->translation($output);
        echo $output;
    }
    
    protected function redirectUrl($url) {
       
        header("Location: ".$url); 
    }
    
    protected function redirect($controller,$action='default') {
       $url_f=factory::getURL();
       $url=$url_f->getUrlRoot().$url_f->makeGet(array('controller'=>$controller,'action'=>$action));
       header("Location: ".$url.'?');
       
    }
    
    function defaultAction() {
        
    }

}
