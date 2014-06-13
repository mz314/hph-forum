<table class="table userlist" width="100%" >
     <thead>
         <tr>
             <th>&nbsp;</th>
             <th>{{User name}}</th>
             <th>{{Login}}</th>
             <th>{{Email}}<th>
             <th>{{Group}}</th>
             <?php if(isM()): ?>
             <th>&nbsp;</th>
             <?php endif ?>
         </tr>
     </thead>
     <tbody>
         <?php foreach ($this->users as $user): ?>
         <tr>
             <td><img src="public/avatars/<?= $user->avatar_image ?>" /></td>
             <td><?= $user->screen_name ?></td>
             <td><?= $user->login ?></td>
             <td><?= $user->email ?></td>
             <td><?= $user->display_name ?></td>
             <?php if(isM()): ?>
             <td>
                 <a href="<?= url(array('controller'=>'user','action'=>'adminEdit','user_id'=>$user->user_id)) ?>"
                    <button>{{Edit}}</button>
                 </a>
                 <a href="<?= url(array('controller'=>'user','action'=>'removeUser','user_id'=>$user->user_id)) ?>"
                    <button>{{Remove}}</button>
                 </a>
<!--                 <button>{{Ban}}</button>
                 <button>{{Inactive}}</button>
Nie w wersji basic
-->
             </td>
             <?php endif ?>
             
         </tr>
         <?php endforeach; ?>
     </tbody>
</table>