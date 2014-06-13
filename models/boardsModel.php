<?php
class boardsModel extends model {
  
    function getBoardsByParent($board_id) {
        $where="parent_id=$board_id";
        return $this->get($where);
    }
    
    function delete($id) {
        $sql="delete from boards cascade where board_id=$id";
        $this->db->exec($sql);
    }
    
    function update($data,$id) {
        $sql="update boards ".$data->toUpdate()." where board_id=$id";
        
        $this->db->exec($sql);
    }
    
    
    function insert($data) {
        $sql="insert into boards ".$data->toInsert();
        return $this->db->exec($sql);
    }
    
    
}