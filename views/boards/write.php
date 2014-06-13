<form action="" method="POST" name="writePost">
    <div class="input-group">
       <span class="input-group-addon">{{Topic:}} </span> <input type="text" name="topic" class="form-control"  />
    </div>
     <div class="input-group">
        <span class="input-group-addon">{{Contents:}}</span>
         
        <textarea name="content" class="form-control"></textarea>
    </div>
    <input style="display: none" name="submitbtn" type="button" value="Post" onclick="sendPost(<?= factory::getRequest()->getVar('reply_id') ?>)" />
    <input type="hidden" name="reply_id" value="<?= factory::getRequest()->getVar('reply_id') ?>" />
    <input type="hidden" name="board_id" value="<?= $this->board_id ?>" />
</form>