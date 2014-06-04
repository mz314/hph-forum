<?php
class menuItem {
    protected $children=array(),$title,$href,$ordering;
    function ifShow() {
        //set proper access right for logged in and unlogged, so logged in can't see log in item and not logged
        // can't see log out
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
?>
