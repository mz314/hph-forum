<div style="" class="userpanel-container">
<ul class="userpanel-btns list-group" style="">
    <li class="list-group-item">
        Logged as: <?= $this->usr->screen_name ?> (<?= $this->usr->login ?>)
    </li>
    <li class="list-group-item">
        <a href="<?= factory::getUrl()->makeGet(array('controller' => 'user', 'action' => 'logout')) ?>">
            <button class="btn btn-danger">
            Logout
            </button>
        </a>
    </li>
    <li class="list-group-item">
        <a href="<?= factory::getUrl()->makeGet(array('controller' => 'user', 'action' => 'edit')) ?>">
            <button class="btn btn-primary">
            Edit    
            </button>
            </a>
    </li>
</ul>
    </div>