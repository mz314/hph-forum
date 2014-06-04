<?php
class menuItem {
    protected $children=array(),$title,$href,$ordering;
    function ifShow() {
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
