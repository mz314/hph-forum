<?php
if (factory::getUser()->isLogged()) {
$login_items=array('User panel'=>url(array('controller'=>'user')));
} else {
    $login_items=array('Login'=>url(array('controller'=>'user')),
        'Register'=>url(array('controller'=>'user','action'=>'register')));
}
$menu=array('Forum'=>factory::getURL()->makeGet(array('controller'=>'boards')),
        'User list'=>url(array('controller'=>'user','action'=>'list')));
#$menu=  array_merge($menu,$login_items);
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
<ul class="top-menu nav navbar-nav">
<?php foreach($menu as $t=>$h): ?>
    <li>
     <a href="<?= $h ?>">{{<?= $t ?>}}</a>
    </li>
    <?php endforeach ?>
    
    <?php foreach($login_items as $t=>$h): ?>
    <li>
     <?php if($t=='Login'): ?>
        <a href="#" class="login-button">{{<?= $t ?>}}</a>
         <?php else: ?>
        <a href="<?= $h ?>">{{<?= $t ?>}}</a>
        <?php endif; ?>
    </li>
    <?php endforeach ?>
    
</ul>
</nav>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">{{Login}}</h4>
            </div>
            <div class="modal-body" id="loginModalContainer">
                <div class="error-msg"></div>
                <div  id="loginContainer">
               
            </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{Close}}</button>
                <button type="button" onclick="logUser()" id="loginSubmit" class="btn btn-primary">{{login}}</button>
            </div>
        </div>
    </div>
</div>
<script>
 $('#loginModal').on('hidden.bs.modal', function(e) {
                $('#loginContainer').html('');
            });
</script>