<?php



class postsModel extends model {

    function getByBoardId($board_id) {
        $where = "board_id=$board_id";
        return $this->get($where);
    }

    function insert($data) {
        $sql="insert into posts ".$data->toInsert();
        $this->db->exec($sql);
    }

}