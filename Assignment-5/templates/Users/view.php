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
<div class="container mt-5">
    <div class="column-responsive column-80">

        <div class="users view content">
        <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'button float-right']) ?>

            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Type') ?></th>
                    <td><?= h($user->user_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($user->user_profile->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($user->user_profile->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($user->user_profile->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image')?></th>
                    <td ><?= $this->Html->image('/'.'upload/'.$user->user_profile->profile_image,['width'=>'100px','height'=>'100px'])?></td>

                </tr>
                <tr>
                    <th><?= __('Contact') ?></th>
                    <td><?= h($user->user_profile->contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($user->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($user->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($user->modified_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Product Comments') ?></h4>
                <?php if (!empty($user->product_comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Comments') ?></th>
                            <th><?= __('Created Date') ?></th>
                            <th><?= __('Modified Date') ?></th>
                            <!-- <th class="actions"><?= __('Actions') ?></th> -->
                        </tr>
                        <?php foreach ($user->product_comments as $productComments) : ?>
                        <tr>
                            <td><?= h($productComments->id) ?></td>
                            <td><?= h($productComments->product_id) ?></td>
                            <td><?= h($productComments->user_id) ?></td>
                            <td><?= h($productComments->comments) ?></td>
                            <td><?= h($productComments->created_date) ?></td>
                            <td><?= h($productComments->modified_date) ?></td>
                            <td class="actions">
                                <!-- <?= $this->Html->link(__('View'), ['controller' => 'ProductComments', 'action' => 'view', $productComments->id]) ?> -->
                                <!-- <?= $this->Html->link(__('Edit'), ['controller' => 'ProductComments', 'action' => 'edit', $productComments->id]) ?> -->
                                <!-- <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'comment_delete', $user->product_comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productComments->id)]) ?> -->
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div> 
            
        </div>
    </div>
                        </div>
</div>
