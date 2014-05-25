<table border="1" width="100%">
    <thead>
        <tr>
            <th>Board</th><th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->boards as $board): ?>     
            <tr>
                <td>
                    <a href="<?= factory::getUrl()->
                makeGet(array('controller' => 'boards', 'board_id' => $board->board_id))
            ?>"><?= $board->name ?></a>
                </td>
                <td><?= $board->description ?></td>
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
