<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
  <?= $this->Html->css([
    
        'milligram.min',
        'cake',
        'style'
 
]) ?>
         <?php echo $this->Flash->render() ?>
<div class="row">
<div class="container">

    
    <div class="column-responsive column-80">
        <div class="users form content">
       <?php  echo $this->Form->create($user,['type'=>'file','id'=>'save']);?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('user_profile.first_name',['required'=>false]);
                    echo $this->Form->control('user_profile.last_name',['required'=>false]);
                    echo $this->Form->control('user_profile.contact',['required'=>false]);
                    echo $this->Form->control('user_profile.address',['required'=>false]);
                    echo $this->Form->control('user_profile.images',['type'=>'file','required'=>false]);
                    // echo $this->Form->control('user_profile.profile_image');
                    echo $this->Form->control('email',['required'=>false]);
                    echo $this->Form->control('password',['required'=>false]);
                    // echo $this->Form->control('ConfirmPassword',['required'=>false]);

                    // echo $this->Form->control('user_type');
                    // echo $this->Form->control('status');
                    // echo $this->Form->control('created_date');
                    // echo $this->Form->control('modified_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <div>
</div>
<?php echo $this->Html->script('scriptvalidate',['Block'=>'script']); ?>

<!-- <script>
    $(document).ready(function(){
        $('#save').on('submit',function(e){
            e.preventDefault();

            var formdata = new FormData(this);
        
            $.ajax({
                url:'/users/add',
                method:'POST',
                contentType:false,
                processData:false,
                data:formdata,
                success:function(){
                    alert('data submit successfully');
                }
            });
        });
    });

    </script> -->