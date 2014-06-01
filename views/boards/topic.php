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
           
                <button name="reply" onclick="writePost(<?= $root->post_id ?>)">Reply</button>
           
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
<input name="reply_id" type="hidden" value="<?= $this->topic->post_id ?>" />
<div id="writeContainer">
</div>