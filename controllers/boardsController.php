<?php
class postData {
    /* POST_ID
      BOARD_ID
      USER_ID
      TOPIC
      DATETIME
      REPLY_ID */

    function __construct($req) {
        $this->board_id = $req->getVar('board_id');
        $this->topic = $req->getVar('topic');
        $this->content = $req->getVar('content');
        $usr = factory::getUser();
        $this->user_id = $usr->getID();
    }
    
    function toInsert() {
        $arr=(array)$this;
       $cols='';
       $rows='';
       $i=0;
       foreach($arr as $k=>$v) {
           $cols.=$k;
           $rows.="'".$v."'";
           if($i<count($arr)-1) {
               $cols.=",";
               $rows.=",";
           } 
           $i++;
       }
       $sql='('.$cols.') values('.$rows.')';
        return $sql;
    }

}

class boardsController extends controller {
    
    function __construct() {
        parent::__construct();
        $this->pmodel=factory::getModel('posts');
    }
    
    function writePostAction() {
      
        
        if ($this->req->isPost()) {
           $this->pmodel->insert(new postData($this->req)); 
        }
        $this->renderView('write');
    }
    
    function topicAction() {
        $this->topic=$this->pmodel->getTopic($this->req->getVar('post_id'));
        $this->renderView('topic');
    }
    
    function defaultAction() {
        $board_id=$this->req->getVar('board_id',0);
        $this->boards=$this->model->getBoardsByParent($board_id);
        
        $this->posts=$this->pmodel->getByBoardId($board_id,true);
        $this->board_id=$board_id;
        $this->renderView('boardlist');
    }
}