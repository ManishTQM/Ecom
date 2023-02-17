<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Users table</h6>
                
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <!-- <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3"> -->
                <h6 class="text-white text-capitalize ps-3"><?= $this->Html->link(__('New Product Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
</h6>
              </div>
            </div>

                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User Id</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Modified Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Change Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="3">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($productCategories as $productCategory): ?>
                    <tr>
                      
                      <td>
                        <p class="text-xs font-weight-bold mb-0 "><?= $this->Number->format($productCategory->id) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 "><?= $productCategory->users_id === null ? '' : $this->Number->format($productCategory->users_id) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($productCategory->category_name) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($productCategory->status) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($productCategory->created_date) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($productCategory->modified_date) ?></p>
                      </td>
                      <?php if ($productCategory->status==2):?>
                      <td class="align-middle text-center text-sm">
                      <?= $this->Form->postLink(__('InActive'), ['action' => 'userstatus', $productCategory->id,$productCategory->status],['class'=>'badge badge-sm bg-gradient-danger'], ['confirm' => __('Are you sure you want to Active # {0}?', $productCategory->id)]) ?>
    </td>                    <?php else:?>
      <td class="align-middle text-center text-sm"><?= $this->Form->postLink(__('Active'), ['action' => 'userstatus', $productCategory->id,$productCategory->status],['class'=>'badge badge-sm bg-gradient-success'], ['confirm' => __('Are you sure you want to InActive # {0}?', $productCategory->id)]) ?>
                <?php endif;?>
                        
                      </td>
                      
                      <td class="align-middle text-center">
                     
                            <?= $this->Html->link(__('View'), ['action' => 'view', $productCategory->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productCategory->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->id)]) ?>
                        
                      </td>
                    </tr>
                    <?php endforeach; ?>
                   
                 
                  
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>