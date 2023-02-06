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
        <div class="users form content">
        <?php  echo $this->Form->create($user,['type'=>'file']);?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('user_type');
                    echo $this->Form->control('user_profile.first_name');
                    echo $this->Form->control('user_profile.last_name');
                    echo $this->Form->control('user_profile.contact');
                    echo $this->Form->control('user_profile.address');
                    echo $this->Form->control('user_profile.images',['type'=>'file']);
                  
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
  </div>
</div>
