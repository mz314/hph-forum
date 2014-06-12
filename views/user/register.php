<form method="POST" name="register" action="<?= url(array('controller' => 'user', 'action' => 'registerUser')); ?>">
    <div class="error-msg">
    </div>
    <div class="input-group">
        <span class="input-group-addon">Login:</span>
        <input type="text" name="login"  class="form-control" />
    </div>
    <div class="input-group">
        <span class="input-group-addon">Password:</span>
        <input type="text" name="pass1"  class="form-control" />
    </div>
    <div class="input-group">
        <span class="input-group-addon">Repeat password:</span>
        <input type="text" name="pass2"  class="form-control" />
    </div> 
    <div class="input-group">
        <span class="input-group-addon">Display name:</span>
        <input type="text" name="screen_name"  class="form-control" />
    </div>
    <div class="input-group upload-group">
        <span class="input-group-addon">Upload avatar:</span>
        <input type="file" name="avatar" class="form-control" />
    </div>





    <div align="right" style="margin-top: 10px">
        <input class="btn btn-primary" type="submit" id="registerUser" value="Register" />
    </div>

</form>
<script>
$('#registerUser').click(validateRegister);
</script>