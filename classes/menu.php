<?php
class menuItem {
    protected $children=array(),$title,$href,$ordering;
    function ifShow() {
        //set proper access right for logged in and unlogged, so logged in can't see log in item and not logged
        // can't see log out
        // add type collumn to db - so there can be used dynamic generated menus and above could be eliminated
        return true;
    }
    
    function getHtml() {
        $children_html='';
        foreach($this->children as $child) {
            $children_html.=$child->getHtml();
        }
        $html='';
        
        $html.='
            <li>
            <a href="'.$this->href.'">'.$title.'</a>
<ul>
'.$children_html.'
</ul>
</li>'; 
        
        return $html;
       }
    
    function __construct($title,$href,$ordering,$children=array()) {
        $this->children=$children;
        $this->title=$title;
        $this->href=$href;
        $this->ordering=$ordering;
    }
}

class menu {
    protected $items;
    
    function build() {
        
    }
    
    function load() {
        $this->db=  factory::getDB()->getDB();
        $sql="select * from menu";
        $this->db->exec($sql);
        $this->items=$this->db->getRows();
    }
    
    function render() {
        ob_start();
        
        $html=  ob_get_clean();
        return $html;
    }
    
    function __construct($name='') { //name doesn't matter now - no db info for that
        $this->load();
        $this->build();
       // var_dump($this->items);
    }
}
?>
