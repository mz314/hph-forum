<style>
    .tree ul li {
        list-style-type: none;
    }
</style>

<?php

function recursive_topics($root,$me, $level = 0, $sender = null) {
    ?>
    <ul class="topic-level-<?= $level ?> topic list-group" data-level="<?= $level ?>">
        <?php
        ob_start();
        if ($root) {
            ?>

            <li class="list-group-item topic-item">
                <?php if(!$sender) {
                    $sender=$root;
                } ?>
                <?php if ($sender): ?>
                    <span class="re">RE: <?= $sender->topic ?></span>
                    <span><?= $root->screen_name ?> (<?= $root->login ?>) </span>
                    <?php if(!empty($root->avatar_image)): ?>
                    <span><img src="public/avatars/<?= $root->avatar_image ?>" width="32" height="32" /></span>
                    <?php endif ?>
                <?php endif ?>
                <?php if ($root->approved == 0): ?>
                    <div class="well">
                     {{This post has been disapproved by moderator}}
                     </div>
                    <?php else: ?>
                    <span class="topic" style="display: block;"><?= $root->topic ?></span>
                    <div class="topic-content well"><?= $root->content->load() ?></div>
                    <span class="topic-buttons">

                        <button class="glyphicon glyphicon-comment" name="reply" onclick="writePost(<?= $root->post_id ?>)"></button>
                        
                    </span>
        <?php endif ?>

                <span class="admin-buttons">              
                    <?php if (isA()): ?>
                        <button onclick="removePost(<?= $root->post_id ?>)" class="glyphicon glyphicon-remove-circle"></button>
                    <?php endif ?>
                    <?php if (isM()): ?>
                        <?php if($root->approved): ?>
                        <button onclick="disapprovePost(<?= $root->post_id ?>,0)" class="glyphicon glyphicon-ban-circle"></button>
                        <?php else: ?>
                        <button onclick="disapprovePost(<?= $root->post_id ?>,1)" class="glyphicon glyphicon-ok-sign"></button>
                            <?php endif ?>
        <?php endif; ?>
                </span>
                    <span class="aux-buttons" style="display: block; float: right;">
                        <?php if($me->iLike($root->post_id)) {
                            
                            $l_icon="glyphicon-thumbs-down";
                          
                        } else {
                          $l_icon="glyphicon-thumbs-up";   
                        }
                        ?>
                        <button onclick="likePost(<?= $root->post_id ?>);" class="glyphicon <?= $l_icon ?>"></button>
                        
                        <span  class="n-likes" data-id="<?= $root->post_id ?>" 
                              >
                            <!-- onmouseover="likesHover(this,<?= $root->post_id ?>)" onmouseout="likesUnhover(this)" -->
                            (<?= count($root->likes) ?>)
<!--                        <div class="likes-container">
                        </div>-->

                       
                    </span>
            </li>
        <?php if (count($root->replies)) { ?>
                <li class="list-group-item">

                    <?php
                    foreach ($root->replies as $r) {
                        echo recursive_topics($r, $me,$level + 1, $root);
                    }
                    ?></li>
        <?php } ?>
        </ul><?php
    }
    return ob_get_clean();
}
?>
<div class="tree">
<?= recursive_topics($this->topic,$this) ?>
</div>
<input name="reply_id" type="hidden" value="<?= $this->topic->post_id ?>" />
