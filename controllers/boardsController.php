<?php

class postData extends dataAbstract {
    
    function actualInit($req) {
        $this->board_id = $req->getVar('board_id');
        $this->topic = $req->getVar('topic');
        $this->content = $req->getVar('content');
        $usr = factory::getUser();
        $this->user_id = $usr->getID();
        $this->reply_id = $req->getVar('reply_id');
        $this->approved=1;
        #$this->date_time=time();
    }
}

class boardData extends dataAbstract {
    function actualInit($req) {
        $this->name=$req->getVar('name');
        $this->description=$req->getVar('description');
        $this->parent_id=$req->getVar('board_id');
    }
    
    function toUpdate() {
        unset($this->parent_id);
        return parent::toUpdate();
        
    }
}

class boardsController extends controller {

    function __construct() {
        parent::__construct();
        $this->pmodel = factory::getModel('posts');
     
        $this->uses_js[]='boards.js';
        
    }

    function deleteBoardAction() {
       $this->model->delete($this->req->getVar('board_id')); 
       $this->redirect('boards');
    }
    
    function writePostAjaxAction() {
       $this->pmodel->insert(new postData($this->req));
       echo 'test';
    }
    
    function removePostAjaxAction() {
        $this->pmodel->removePost($this->req->getVar('post_id'));
        //$this->jsonReply('200');
    }
    
    function disapprovePostAjaxAction() {
        $this->pmodel->disapprovePost($this->req->getVar('post_id'),$this->req->getVar('approval'));
        $this->jsonReply('200');
    }
    
    function writePostAction() {
        $this->reply_post = null;
        if ($this->req->getVar('reply_id')) {
            $this->reply_post = $this->pmodel->getTopic($this->req->getVar('reply_id'));
            $this->board_id = $this->reply_post->board_id;
        } else {
            $this->board_id = $this->req->getVar('board_id');
        }
        //$uid=factory::getUser()->getID();
        if ($this->req->isPost()) {
            
        }
        $this->renderView('write', true);
    }

    function topicListAjaxAction() {
        $board_id = $this->req->getVar('board_id', 0);
        $this->posts = $this->pmodel->getByBoardId($board_id, true);
        $this->board_id = $board_id;
        $this->renderView('topics',true);
    }

    function editBoardAction() {
        $bid=$this->req->getVar('board_id');
        if($this->req->isPost()) {
            $bd=new boardData($this->req);
            
            $this->model->update($bd,$bid);
        }
        
        $this->board=$this->model->get("board_id=$bid");
        $this->board=$this->board[0];
        $this->renderView('createboard');
    }
    
    function createBoardAction() {
        if($this->req->isPost()) {
            $bd=new boardData($this->req);
            $this->model->insert($bd);
            $this->redirect('boards');
        } else {
            $this->board=new boardData($this->req);
        }
        $this->renderView('createboard');
    }
    
    function topicAjaxAction() {
         $this->topic = $this->pmodel->getTopic($this->req->getVar('post_id'));
         $this->renderView('topic',true);
    }
    
    function topicAction() {
       $this->topic = $this->pmodel->getTopic($this->req->getVar('post_id'));
        $this->renderView('topic_container');
    }

    function defaultAction() {
        $board_id = $this->req->getVar('board_id', 0);
        $this->boards = $this->model->getBoardsByParent($board_id);

        $this->posts = $this->pmodel->getByBoardId($board_id, true);
        $this->board_id = $board_id;
        $this->renderView('boardlist');
    }

}