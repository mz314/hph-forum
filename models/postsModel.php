<?php



class postsModel extends model {

    function getReplies($post) {
        $where=" reply_id=$post->post_id ";
        
        $replies=$this->get($where);
        if(count($replies)) {
            foreach($replies as &$r) {
                $r->replies=$this->getReplies($r);
            }
        } 
        return $replies;
    }
    
    
    function getTopic($post_id) {
        $where="post_id=$post_id";
        $topic=$this->get($where);
        $topic=$topic[0];
        
        $topic->replies=$this->getReplies($topic);
        
        return $topic;
    }
//function get    
    function getByBoardId($board_id,$parent_only=false) {
        $where = "board_id=$board_id";
        if($parent_only) {
            $where.=" and (reply_id=0 or reply_id is null)";
        }
        return $this->get($where);
    }

    protected function mkGetSQL($where) {
        $sql = "select * from {$this->table_name} p 
left join users u on p.user_id=u.user_id            
where $where";
       // echo $sql;
        return $sql;
    }
            
    function insert($data) {
        $sql="insert into posts ".$data->toInsert();
        $this->db->exec($sql);
    }

}