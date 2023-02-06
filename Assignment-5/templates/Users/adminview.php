<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
  <?= $this->Html->css([
      
        'normalize.min',
        'milligram.min',
        'cake',
        'style'
          
        ]) ?>
         <?php echo $this->Flash->render() ?>
<div class="row">
<div class="container">
    
    <div class="column-responsive column-80">
        
        <div class="users view content">
        <h3 style="text-align:center;"><b>My Profile</b></h3>

                <?= $this->Html->link(__('Back'), ['controller'=>'Users','action' => 'index'], ['class' => 'button float-left']) ?>
    <?= $this->Html->link(__('Edit'), ['controller'=>'Users','action' => 'editadmin'], ['class' => 'button float-right']) ?>

       
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                
                <tr>
                    <th><?= __(' First Name') ?></th>
                    <td><?= h($user->user_profile->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __(' Last ') ?></th>
                    <td><?= h($user->user_profile->last_name) ?></td>
                </tr><tr>
                    <th><?= __(' Contact ') ?></th>
                    <td><?= h($user->user_profile->contact) ?></td>
                </tr><tr>
                    <th><?= __(' Address') ?></th>
                    <td><?= h($user->user_profile->address) ?></td>
                </tr><tr>
                    <th><?= __(' Profile Image') ?></th>
                    <td ><?= $this->Html->image('/'.'upload/'.$user->user_profile->profile_image,['width'=>'100px','height'=>'100px'])?></td>
               </tr>
                <tr>
                    <th><?= __(' Account Created Date') ?></th>
                    <td><?= h($user->created_date) ?></td>
                </tr>
                
            </table>
          
           
            
        </div>
    </div>
  </div>
</div>
