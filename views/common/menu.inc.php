<?php
if (factory::getUser()->isLogged()) {
$login_items=array('User panel'=>url(array('controller'=>'user')));
} else {
    $login_items=array('Login'=>url(array('controller'=>'user')),
        'Register'=>url(array('controller'=>'user','action'=>'register')));
}
$menu=array('Forum'=>factory::getURL()->makeGet(array('controller'=>'boards')));
$menu=  array_merge($menu,$login_items);
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
<ul class="top-menu nav navbar-nav">
<?php foreach($menu as $t=>$h): ?>
    <li>
     <a href="<?= $h ?>"><?= $t ?></a>
    </li>
    <?php endforeach ?>
</ul>
</nav>
