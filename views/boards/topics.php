<div class="panel panel-default">  
<table class="topics table" width="100%">
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
</div>