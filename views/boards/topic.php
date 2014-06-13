<style>
    .tree ul li {
        list-style-type: none;
    }
</style>

<?php

function recursive_topics($root, $level = 0, $sender = null) {
    ?>
    <ul class="topic-level-<?= $level ?> topic list-group" data-level="<?= $level ?>">
        <?php
        ob_start();
        if ($root) {
            ?>

            <li class="list-group-item topic-item">
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

                        <!-- Admin buttons loaded via js+ajax -->
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
            </li>
        <?php if (count($root->replies)) { ?>
                <li class="list-group-item">

                    <?php
                    foreach ($root->replies as $r) {
                        echo recursive_topics($r, $level + 1, $root);
                    }
                    ?></li>
        <?php } ?>
        </ul><?php
    }
    return ob_get_clean();
}
?>
<div class="tree">
<?= recursive_topics($this->topic) ?>
</div>
<input name="reply_id" type="hidden" value="<?= $this->topic->post_id ?>" />
