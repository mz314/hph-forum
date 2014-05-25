<?php
class boardsModel extends model {
  
    function getBoardsByParent($board_id) {
        $where="parent_id=$board_id";
        return $this->get($where);
    }
    
    
}