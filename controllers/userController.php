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
                $this->user->login($req->getVar('login'),$req->getVar('password'));
                //Błąd, bo jak się uda zalogować, to dalej będzie to samo, dopuki się nie przeładuje
            }

            $this->renderView('login');
        } else {
             $this->renderView('panel');
        }
    }

}