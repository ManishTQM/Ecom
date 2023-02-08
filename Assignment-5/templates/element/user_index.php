                    
       
     <div class='table-responsive'>
            <table>
    
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('email') ?></th>
                        <th><?= $this->Paginator->sort('user_type') ?></th>
                        <th><?= $this->Paginator->sort('status') ?></th>
                        <th><?= $this->Paginator->sort('created_date') ?></th>
                        <th><?= $this->Paginator->sort('modified_date') ?></th>
                        <th><?= $this->Paginator->sort('Define Status') ?></th>
                        <th><?= $this->Paginator->sort('First Name') ?></th>
                        <th><?= $this->Paginator->sort('Last Name') ?></th>
                        <th><?= $this->Paginator->sort('Contact') ?></th>
                        <th><?= $this->Paginator->sort('Address') ?></th>
                        <th><?= $this->Paginator->sort('Profile Image') ?></th>
    
                        <th colspan="3"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach ($users as $user): ?>
                        <?php if($user->user_type ==1){
                            continue;
                        }
                        ?>
                    <tr>
                        <!-- <td><?= $this->Number->format($user->id) ?></td> -->
                        <td><?= h($user->id) ?></td>
    
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->user_type) ?></td>
                        <td><?= h($user->status) ?></td>
                        <td><?= h($user->created_date) ?></td>
                        <td><?= h($user->modified_date) ?></td>
                        <?php if ($user->status==2):?>
                        <td><?= $this->Form->postLink(__('InActive'), ['action' => 'userstatus', $user->id,$user->status], ['confirm' => __('Are you sure you want to Active # {0}?', $user->id)]) ?>
    </td>                    <?php else:?>
              <td><?= $this->Form->postLink(__('Active'), ['action' => 'userstatus', $user->id,$user->status], ['confirm' => __('Are you sure you want to InActive # {0}?', $user->id)]) ?>
                <?php endif;?>
                        <td><?= h($user->user_profile->first_name) ?></td>
                        <td><?= h($user->user_profile->last_name) ?></td>
                        <td><?= h($user->user_profile->contact) ?></td>
                        <td><?= h($user->user_profile->address) ?></td>
                        <td ><?= $this->Html->image('/'.'upload/'.$user->user_profile->profile_image,['width'=>'100px','height'=>'100px'])?></td>
                        <td>
                            <?= $this->Html->link(__(''), ['action' => 'view', $user->id],['class'=>"fa-solid fa-eye"]) ?>
                            <?= $this->Html->link(__(''), ['action' => 'edit', $user->id],['class'=>"fa-solid fa-pen-to-square"]) ?>
                            <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id],['class'=>"fa-solid fa-trash"], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
       
    </div> 
       
    
    
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    