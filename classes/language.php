<?php
class language {
    const LANGKEY='lang';
    private $fn='',$req,$keys=array();
    
    
    function initLang() {
        $lc=$this->req->getSession(language::LANGKEY);
        if($lc) {
        $fn=APP_WD.'/lang/'.$lc.'.php';
        
        if(!file_exists($fn)) {
            throw new Exception('No such language');
        }
        $this->fn=$fn;
        require_once $fn;
        $this->keys=$l; 
        }
    }
    
    function __construct($req) {
        $this->req=$req;
        $this->initLang();
    }
    
    function set($code) {
        $this->req->setSession(language::LANGKEY,$code);
        $this->initLang();
    }
    
    function translate($key) {
        $lang=$this->req->getSession(language::LANGKEY,null);
        
        if($lang) {
            $uc=  strtolower($key);
            if(array_key_exists($key, $this->keys)) {
                return $this->keys[$key];
            } else if (array_key_exists($uc, $this->keys)){
                return $this->keys[$uc];
            } else {
                return $key;
            }
        } else {
            return $key;
        }
    }
    
}