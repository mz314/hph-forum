<?php

if($this->adminedit) {
    $action=url(array('controller'=>'user','action'=>'adminSaveUser'));
} else if(!empty($this->usr->user_id)) {
$action=url(array('controller' => 'user', 'action' => 'saveUser'));
}
else {
    $action=url(array('controller' => 'user', 'action' => 'registerUser'));
}
?>
<form method="POST" name="register" action="<?= $action; ?>" enctype="multipart/form-data">
    <div class="error-msg">
    </div>
    <div class="input-group">
        <span class="input-group-addon">{{Login:}}</span>
        <input type="text" name="login"  class="form-control" value="<?= $this->usr->login ?>" />
    </div>
    <div class="input-group">
        <span class="input-group-addon">{{Password}}:</span>
        <input type="password" name="pass1"  class="form-control" />
    </div>
    <div class="input-group">
        <span class="input-group-addon">{{Repeat password}}:</span>
        <input type="password" name="pass2"  class="form-control" />
    </div> 
    <div class="input-group">
        <span class="input-group-addon">{{Display name}}:</span>
        <input type="text" name="screen_name"  class="form-control" value="<?= $this->usr->screen_name ?>"/>
    </div>
    <div class="input-group">
        <span class="input-group-addon">{{Email}}:</span>
        <input type="text" name="email"  class="form-control" value="<?= $this->usr->email ?>"/>
    </div>
    <div class="input-group upload-group">
        <span class="input-group-addon">{{Upload avatar}}:</span>
        <input type="file" name="avatar" class="form-control" />
    </div>


<?php 

if(isset($this->adminedit) && $this->adminedit): ?>
<input type="hidden" name="user_id" value="<?= $this->usr->user_id ?>" />
  <div class="input-group">
        <span class="input-group-addon">{{Group}}:</span>
        <select name="group_id" class="form-control">
    <?php foreach($this->groups as $g): 
        $sel='';
    if($g->group_id==$this->usr->group_id) {
        $sel='selected="selected"';
    }    
    ?>
    
    <option value="<?= $g->group_id ?>" <?= $sel ?>><?=$g->display_name ?></option>
        <?php        endforeach; ?>
</select>
    </div> 

    <?php endif ?>


    <div align="right" style="margin-top: 10px">
        <?php if(!empty($this->usr->user_id)): ?>
        
        <input class="btn btn-primary" type="submit" id="registerUser" value="{{Update}}" />
            <?php else: ?>
        <input class="btn btn-primary" type="submit" id="registerUser" value="{{Register}}" />
            <?php endif ?>
        
    </div>

</form>
<script>
$('#registerUser').click(validateRegister);
</script>