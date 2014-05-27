<?php if (count($this->boards)): ?>
    <table border="1" width="100%" class="boards">
        <thead>
            <tr>
                <th>Board</th><th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->boards as $board): ?>     
                <tr>
                    <td>
                        <a href="<?=
                                factory::getUrl()->
                                makeGet(array('controller' => 'boards', 'board_id' => $board->board_id))
                        ?>"><?= $board->name ?></a>
                    </td>
                    <td><?= $board->description ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<table class="topics" border="1" width="100%">
    <thead>
        <tr>
            <th>Topic</th>
            <th>Author</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->posts as $post): ?>
    <tr>    
    <td>
    <a href="<?= factory::getURL()->makeGet(array('controller' => 'boards', 'action' => 'topic',
        'post_id'=>$post->post_id)) ?>"> 
        <?= $post->topic ?>
    </a>
    </td>
        <td><?= (!empty($post->login) ? $post->login : '&mdash;') ?></td>
        <td><?= ($post->datetime ? date('m-d-Y H:i:s',$post->datetime) : '&mdash;' ) ?></td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
<?php if ($this->board_id != 0): ?>
    <div>
        <a href="<?= factory::getURL()->makeGet(array('controller' => 'boards', 'action' => 'writePost')); ?>">
            <button>Create a topic</button>
        </a>
    </div>
<?php endif; ?>
