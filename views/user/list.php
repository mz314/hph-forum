<table class="table userlist" width="100%" >
     <thead>
         <tr>
             <th>&nbsp;</th>
             <th>{{User name}}</th>
             <th>{{Login}}</th>
             <th>{{Email}}<th>
                 <th>{{Group}}</th>
         </tr>
     </thead>
     <tbody>
         <?php foreach ($this->users as $user): ?>
         <tr>
             <td>avatar</td>
             <td><?= $user->screen_name ?></td>
             <td><?= $user->login ?></td>
             <td><?= $user->email ?></td>
             <td><?= $user->display_name ?></td>
             
         </tr>
         <?php endforeach; ?>
     </tbody>
</table>