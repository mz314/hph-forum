<?php

class userData extends dataAbstract {
     function actualInit($req) {
         $this->login=$req->getVar('login');
         $user=  factory::getUser();
         $p=$req->getVar('pass1');
         if(!empty($p)) {
         $this->password=$user->generatePassword($req->getVar('pass1'));
         } else {
             $this->password='';
         }
         $this->screen_name=$req->getVar('screen_name');
         $this->active=1;
         $this->banned=0;
         $this->email=$req->getVar('email');
     }
     
     function toUpdate() {
         
         if(empty($this->password)) {
             unset($this->password);
         }
         return parent::toUpdate();
     }
     
     function validate($req) {
         $errors=array();
//         if($this->password!=$req->getVar('pass2')) {
//             $errors[]='Passowrds mismatch';
//         }
//         if(empty($this->password)) {
//             $errors[]='Passwords are empty';
//         }
         if(count($errors)==0) {
             return false;
         } else {
             return $errors;
         }
     }
}

class userController extends controller {

    function logoutAction() {
        factory::getUser()->logout();
        $this->redirect('boards');
    }

    function registerAjaxValidAction() {
         $req = factory::getRequest();
        $ud=new userData($req);
        $valid=$ud->validate($req);
        if (!$valid) {
            $this->jsonReply(200);
        } else {
            $this->jsonReply(500,$valid);
        }
        
    }
    
    function registeredInfoAction() {
         $this->renderView('registered');
    }
    
    function uploadAvatar() {
     $fn=md5(time()).$_FILES["avatar"]["name"];
     
     
        move_uploaded_file($_FILES["avatar"]["tmp_name"],APP_WD .'/public/avatars/'.$fn);
     return $fn; 
    }
    
    function handleAvatar($ud) {
        if(!empty($_FILES['avatar']['name'])) {
            $fn=$this->uploadAvatar();
            $ud->avatar_image=$fn;
        }
        return $ud;
    }
    
    function registerUserAction() {
       
           
        
        
        $req = factory::getRequest();
        $ud=new userData($req);
        
        $user=  factory::getUser();
       $ud=$this->handleAvatar($ud);
        
        if ($user->addUser($ud)) {
         $this->redirect('user','registeredInfo');
            
        } else {
         die('db error');
            
        };
    }
    
    function removeUserAction() {
        $user=  factory::getUser();
        $user->remove($this->req->getVar('user_id'));
        $this->redirect('user','list');
    }
    
    function saveUserAction($uid=null) {
        
        
        $ud=new userData($this->req);
        $user=  factory::getUser();
        $ud=$this->handleAvatar($ud);
        
        $user->updateUser($ud,$uid);
        if($uid) {
            $this->redirectUrl(url(array('controller'=>'user','action'=>'adminEdit','user_id'=>$uid)));
        } else {
        $this->redirect("user","edit");
        }
    }
    
    function adminSaveUserAction() {
         $user=  factory::getUser();
         $user->setGroup($this->req->getVar('user_id'),$this->req->getVar('group_id'));
        $this->saveUserAction($this->req->getVar('user_id'));
    }
    
    function adminEditAction($uid=null) {
        if(!$uid) {
            $uid=$this->req->getVar('user_id');
        }
        $user=  factory::getUser();
        
        $usr=$user->get('u.user_id='.$uid);
        $this->usr=$usr[0];
        $this->adminedit=true;
        $this->groups=$user->getGroups();
        $this->user=$user;
        $this->renderView('register'); 
    }
    
    function editAction() {
       $user=  factory::getUser();
        $this->adminEditAction($user->getID());
    }
    
    function registerAction() {
        $this->usr=new userData($this->req);
        $this->usr->password='';
        $this->renderView('register');
    }

    function loginAction() {
        $req = factory::getRequest();
        $this->user = factory::getUser();
        if ($this->user->login($req->getVar('login'), $req->getVar('password')) == user::OK) {
            $this->jsonReply(200);
        } else {
            $this->jsonReply(500, 'Bad login or password');
        }
    }

    function defaultAction() {
        $req = factory::getRequest();
        $this->user = factory::getUser();
        if (!$this->user->isLogged()) {
            if ($req->isPost()) {
                if ($this->user->login($req->getVar('login'), $req->getVar('password')) == user::OK) {
                    return $this->renderView('panel');
                }
            }

            $this->renderView('login', true);
        } else {
            $this->renderView('panel');
        }
    }

    function listAction() {
        $user=  factory::getUser();
        $this->users=$user->getInfoAll();
        
        $this->renderView('list');
    }
}