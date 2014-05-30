<form action="" method="POST">
    <ul>
        <li>Topic:
        <input type="text" name="topic" /></li>
        <li>Contents:
            <textarea name="content"></textarea>
        </li>
    </ul>
    <input type="submit" value="Post" />
    <input type="hidden" name="reply_id" value="<?= factory::getRequest()->getVar('reply_id') ?>" />
    <input type="hidden" name="board_id" value="<?=$this->board_id ?>" />
</form>