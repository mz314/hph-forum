<?php

class userData extends dataAbstract {
     function actualInit($req) {
         $this->login=$req->getVar('login');
         $this->password=$req->getVar('pass1');
         $this->screen_name=$req->getVar('screen_name');
         $this->active=1;
         $this->banned=0;
     }
}

class userController extends controller {

    function logoutAction() {
        factory::getUser()->logout();
        $this->redirect('user');
    }

    function registerAjaxValid() {
        
    }
    
    function registerUserAction() {
         $req = factory::getRequest();
        $ud=new userData($req);
        var_dump($ud);
    }
    
    function registerAction() {
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

}