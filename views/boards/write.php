<form action="" method="POST" name="writePost">
    <div>
        {{Topic:}} <input type="text" name="topic" />
    </div>
    <div>
        {{Contents:}}
        <textarea name="content"></textarea>
    </div>
    <input style="display: none" name="submitbtn" type="button" value="Post" onclick="sendPost(<?= factory::getRequest()->getVar('reply_id') ?>)" />
    <input type="hidden" name="reply_id" value="<?= factory::getRequest()->getVar('reply_id') ?>" />
    <input type="hidden" name="board_id" value="<?= $this->board_id ?>" />
</form>