<?php
require_once "model.php";
class user extends model {
    const NOUSER=-1,NOPASSWORD=-2,OK=0;
    
    function addUser($data) {
        
    }
    
    function getToken($un,$token) {
        $sql="select * from users where token=".$this->db->q($token)." and login=".$this->db->q($un); //and token not = ''
        $this->db->exec($sql);
        $r=$this->db->getRow();
        if($r) {
            return $r;
        } else {
            return false;
        }
    }
    
    function getID() {
        $req=  factory::getRequest();
        $usr=$req->getSession('user');
        $u=$this->getToken($usr['login'], $usr['token']);
        return $u->user_id;
    }
    
    function isLogged() {
        $req=  factory::getRequest();
        $user=$req->getSession('user');
        if($user) {
            return $this->getToken($user['login'],$user['token']);
        } else {
            return false;
        }
    }

    function generatePassword($pass, $salt = null) {
        if (!$salt) {
            $salt = md5(rand(0, 65535));
        }
        $pass_sum = md5($pass . $salt);
        return $pass_sum . ',' . $salt;
    }
    
    function setToken($un,$token=Null) {
        if ($token) {
            $token='';
        } else {
            $token=md5(rand(0,65535));
        }
        $sql="update users set token=".$this->db->q($token)." where login=".$this->db->q($un);
        $this->db->exec($sql);
        return $token;
    }
    
    
    function logout() {
        $req=  factory::getRequest();
        $user=$req->getSession('user');
       return $this->setToken($user['login']);
    }
    
    function login($un, $pw) {
        $sql = "select * from users where login=".$this->db->q($un);
        $this->db->exec($sql);
        $res = $this->db->getRow();
        #var_dump($res);
        if(!$res) {
            return user::NOUSER;
        }
        $pass=  explode(",", $res->password);
        
        $pass_input=explode(",",$this->generatePassword($pw,$pass[1]));
        if($pass_input[0]==$pass[0]) {
            $req=  factory::getRequest();
            $req->setSession('user',array('token'=>$this->setToken($un),'login'=>$un));
            return user::OK;
        } else {
            return user::NOPASSWORD;
        }
    }

}