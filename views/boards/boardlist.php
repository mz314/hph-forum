<?php if (count($this->boards)): ?>
    <table class="list-table boardlist" width="100%" class="boards">
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
<input name="board_id" type="hidden" value="<?= $this->board_id ?>" />
<div id="topicsContaner">
</div>
<?php if ($this->board_id != 0): ?>
    <div>
<!--        <a href="<?= factory::getURL()->makeGet(array('controller' => 'boards', 'action' => 'writePost',
            'board_id'=>factory::getRequest()->getVar('board_id'))); ?>">-->
            <button onclick="writePost()">Create a topic</button>
<!--        </a>-->
    </div>
<?php endif; ?>

<div id="writeContainer">
</div>
<script>
 loadTopicList();
</script>
