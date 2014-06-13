<?php

require_once "model.php";

class user extends model {

    const NOUSER = -1, NOPASSWORD = -2, OK = 0;

    function __construct() {
        parent::__construct();
        $this->table_name = 'users';
    }
    
    function setGroup($uid,$gid) {
        $sql="delete from user_group where user_id=$uid";
        $this->db->exec($sql);
        $sql="insert into user_group (user_id,group_id) values ($uid,$gid)";
        $this->db->exec($sql);
    }
    
    function getGroups() {
        $sql="select * from groups";
        $where="";
        if(!isA()) {
            $where="where name<>'SUPERADMINS'";
        }
        $sql.=$where;
        $this->db->exec($sql);
        return $this->db->getRows();
        
    }
    
    function remove($user_id) {
        $sql="delete from users cascade where user_id=$user_id";
//        echo $sql;
//        die;
        $this->db->exec($sql);
    }
    
    function updateUser($data, $override_id = null) {
        if ($override_id) {
            $id = $override_id;
        } else {
            $id = $this->getID();
        }
        $sql = "update users " . $data->toUpdate() . " where user_id=$id ";
        
        return $this->db->exec($sql);
    }

    protected function isSomeone($someone) {
        $uid = $this->getID();
        if (!$uid) {
            return false;
        }
        $u = $this->get("u.user_id=$uid and g.name='$someone'");
        if (count($u) == 0) {
            return false;
        } else {
            return true;
        }
    }

    function isModerator() {
        return $this->isSomeone('MODERATORS') || $this->isSomeone('SUPERADMINS');
    }

    function isAdmin() {
        return $this->isSomeone('SUPERADMINS');
    }

    protected function mkGetSQL($where = '1') {
        $sql = "select * from users u
            join user_group ug on u.user_id=ug.user_id 
            join groups g on g.group_id=ug.group_id ";
        if ($where != '1') {
            $sql.=" where $where";
        }

        return $sql;
    }

    function getInfoAll() {
        return $this->get();
    }

    function addUser($data) {
        $x = $data->toInsert();
        $sql = "insert into users " . $x;
        $r = $this->db->exec($sql);
        $this->db->exec("select useq.nextval from dual");
        $id = $this->db->getRow();

        $id = $id->nextval - 1;
        $gidsql = "select group_id from groups where name='REGULARS'";
        $this->db->exec($gidsql);
        $gid = $this->db->getRow();
        $gid = $gid->group_id;

        $sql = "insert into user_group (user_id,group_id) values ($id,$gid) ";
        $this->db->exec($sql);


        return $r;
    }

    function getToken($un, $token) {
        $sql = "select * from users where token=" . $this->db->q($token) . " and login=" . $this->db->q($un); //and token not = ''
        $this->db->exec($sql);
        $r = $this->db->getRow();
        if ($r) {
            return $r;
        } else {
            return false;
        }
    }

    function getID() {
        $req = factory::getRequest();
        $usr = $req->getSession('user');
        $u = $this->getToken($usr['login'], $usr['token']);
        if ($u) {
            return $u->user_id;
        } else {
            return false;
        }
    }

    function isLogged() {
        $req = factory::getRequest();
        $user = $req->getSession('user');
        if ($user) {
            return $this->getToken($user['login'], $user['token']);
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

    function setToken($un, $token = Null) {
        if ($token) {
            $token = '';
        } else {
            $token = md5(rand(0, 65535));
        }
        $sql = "update users set token=" . $this->db->q($token) . " where login=" . $this->db->q($un);
        $this->db->exec($sql);
        return $token;
    }

    function logout() {
        $req = factory::getRequest();
        $user = $req->getSession('user');
        return $this->setToken($user['login']);
    }

    function login($un, $pw) {
        $sql = "select * from users where login=" . $this->db->q($un);
        $this->db->exec($sql);
        $res = $this->db->getRow();
        #var_dump($res);
        if (!$res) {
            return user::NOUSER;
        }
        $pass = explode(",", $res->password);

        $pass_input = explode(",", $this->generatePassword($pw, $pass[1]));
        if ($pass_input[0] == $pass[0]) {
            $req = factory::getRequest();
            $req->setSession('user', array('token' => $this->setToken($un), 'login' => $un));
            return user::OK;
        } else {
            return user::NOPASSWORD;
        }
    }

}