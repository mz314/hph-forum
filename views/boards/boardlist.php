
<?php if (count($this->boards)): ?>
    <div class="panel panel-default">   

        <table class="table boardlist boards" width="100%" >
            <thead>
                <tr>
                    <th>{{Board}}</th><th>{{Description}}</th>
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
    </div>
<?php endif; ?>
<input name="board_id" type="hidden" value="<?= $this->board_id ?>" />
<?php if ($this->board_id != 0): ?>
<div id="topicsContaner">
</div>
<?php 
                     
if (factory::getUser()->isLogged()): ?>
    <div>
        <button type="button"  onclick="writePost()" class="btn btn-default">
            {{Create a topic}}
        </button>
    </div>
<?php endif; ?>
<?php endif; ?>
<?php if (isA()): ?>
<div class="admin-buttons">
    <a href="<?= url(array('controller'=>'boards','action'=>'createBoard','board_id'=>$this->board_id)) ?>">    
    <button type="button"  class="btn btn-default">
            {{Create new board}}
        </button>
    </a>
    <a href="<?= url(array('controller'=>'boards','action'=>'editBoard','board_id'=>$this->board_id)) ?>">    
    <button type="button"  class="btn btn-default">
            {{Edit board}}
        </button>
    </a>
    <a href="<?= url(array('controller'=>'boards','action'=>'deleteBoard','board_id'=>$this->board_id)) ?>">    
    <button type="button"  class="btn btn-default">
            {{Delete board}}
        </button>
    </a>
<!--    <a href="<?= url(array('controller'=>'boards','action'=>'lockBoard')) ?>">    
    <button type="button"  class="btn btn-default">
            {{Lock board}}
        </button>
    </a>
    Po wersji basic.
    -->
    </div>
 <?php endif; ?>


<?php require "write_modal.inc.php" ?>

<script>
            loadTopicList();
           
</script>