<form method="POST">
     <div class="error-msg">
    </div>
    <div class="input-group">
        <span class="input-group-addon">{{Name:}}</span>
        <input type="text" name="name"  class="form-control" value="<?= $this->board->name ?>" />
    </div>
    <div class="input-group">
        <span class="input-group-addon">{{Description:}}</span>
        <input type="text" name="description"  class="form-control" value="<?= $this->board->description ?>" />
    </div>
    
<input type="hidden" name="board_id" value="<?= $this->req->getVar('board_id') ?>" />
    <input class="btn btn-primary" type="submit" id="registerUser" value="{{Create}}" />
</form>