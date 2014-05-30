<?php
 function recursive_topics($root,$level=0) {
     ?>
<ul class="topic-level-<?=$level?> topic">
    <?php
     ob_start();
     if($root) {
         ?>

    <li>
        <span class="topic" style="display: block;"><?= $root->topic ?></span>
        <span class="topic-content"><?= $root->content->load() ?></span>
        <span class="topic-buttons">
            <a href="?controller=boards&action=writePost&reply_id=<?= $root->post_id ?>">
                <button name="reply">Reply</button>
            </a>
            <!-- Admin buttons loaded via js+ajax -->
        </span>
    </li>
    <?php if (count($root->replies)) { ?>
    <li>
        
   <?php foreach($root->replies as $r) { 
       echo recursive_topics($r,++$level);
   } 
?></li>
    <?php } ?>
             </ul><?php }
     return ob_get_clean();
 }
?>
<?= recursive_topics($this->topic) ?>

