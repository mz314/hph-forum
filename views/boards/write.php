<form action="" method="POST" name="writePost">
    <ul>
        <li>
            Topic: <input type="text" name="topic" />
        </li>
        <li>Contents:
            <textarea name="content"></textarea>
        </li>
    </ul>
    <input type="button" value="Post" onclick="sendPost(<?= factory::getRequest()->getVar('reply_id') ?>)" />
    <input type="hidden" name="reply_id" value="<?= factory::getRequest()->getVar('reply_id') ?>" />
    <input type="hidden" name="board_id" value="<?=$this->board_id ?>" />
</form>