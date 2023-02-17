<!-- Modal
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            ============= hidden image and id if image is not updated ============ 
            
            <?php  echo $this->Form->create(null,['type'=>'file','id'=>'useredit']);?>
            <input type="hidden" id="imagedd" name="imagedd">
            <input type="hidden" id="iddd" name="iddd">
                    <div class="input-group input-group-outline mb-3">
      <?php echo $this->Form->control('user_profile.first_name',['required'=>false,'class'=>"form-control",'id'=>'firstname']);?>
      <?php echo $this->Form->control('user_profile.last_name',['required'=>false,'class'=>"form-control",'id'=>'lastname']);?>
      <?php echo $this->Form->control('user_profile.contact',['required'=>false,'class'=>"form-control",'id'=>'contact']);?>
      <?php echo $this->Form->control('user_profile.address',['required'=>false,'class'=>"form-control",'id'=>'address']);?>
      <?php echo $this->Form->control('user_profile.profile_image',['type'=>'file','class'=>"form-control"])  ;?> 
      <img src=""id="showimg" width="100px" alt=""> 
      <?php echo $this->Form->control('email',['type'=>'email','class'=>"form-control",'id'=>'email'])  ;?>  
                  
      </div>
      <div class="modal-footer">
      <?= $this->Form->button('Submit',['class'=>'btn btn-primary']) ?>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div> -->