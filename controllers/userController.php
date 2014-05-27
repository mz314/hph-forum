<?php

class userController extends controller {

    function logoutAction() {
        factory::getUser()->logout();
        $this->redirect('user');
    }

    function registerAction() {
         $this->renderView('register');
    }
    
    function defaultAction() {
        $req = factory::getRequest();
        $this->user = factory::getUser();
        if (!$this->user->isLogged()) {
            if ($req->isPost()) {
                if ($this->user->login($req->getVar('login'),$req->getVar('password'))==user::OK) {
                  return $this->renderView('panel');  
                }
               
            }

            $this->renderView('login');
        } else {
             $this->renderView('panel');
        }
    }

}