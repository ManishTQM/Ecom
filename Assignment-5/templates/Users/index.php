<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
  <?= $this->Html->css([
    
        'normalize.min',
        'milligram.min',
        'cake',
        'style'
          
        ]) ?>
         
     
   
 <div class="container-flex">
         <div class="row">
        <div class="users index content col-sm-2">

        <?php echo $this->element('sidebar');?>
  </div>
<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content col-sm-10">
<div><h3 style="text-align:center;"><b>Welcome Admin</b></h3><?php echo $this->Flash->render() ?>
             Loged In Admin Id :- <?php $session = $this->request->getSession();
    echo $session->read('email');
    error_reporting(0);
    
     ?>
             <?= $this->Html->link(__('My Profile'), ['action' => 'adminview'], ['class' => 'button float-right']) ?>

            </div><br>
<div class="users index content">
    <!-- <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
   
                        <label for="">Select Categories</label>
                        <select name="category_id" id="selct" class="form-control">
                           <option value="" disabled selected>choose category</option>
                           <option value="1">Active</option>
                           <option value="2">InActive</option>
                        </select>
                      
                       
                   


    <h3><?= __('Users') ?></h3>
   
    
    <?php 
    echo $this->element('user_index')?>
    </div>
   
</div>
</div>
</div>





