<?php
 function recursive_topics($root) {
     ?>
<ul>
    <?php
     ob_start();
     if($root) {
         ?>

    <li><?= $root->content->load() ?></li>
    <?php if (count($root->replies)) { ?>
    <li>
        
   <?php foreach($root->replies as $r) { 
       echo recursive_topics($r);
   } 
?></li>
    <?php } ?>
             </ul><?php }
     return ob_get_clean();
 }
?>
<?=recursive_topics($this->topic) ?>

