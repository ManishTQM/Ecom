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
                <h6 class="text-white text-capitalize ps-3"><?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>

</h6>
              </div>
            </div>

                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">product_title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category id</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Image</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product tags</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Modified date</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Change Status</th> -->
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="3">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($products as $product): ?>
                    <tr>
                      
                      <td>
                        <p class="text-xs font-weight-bold mb-0 "><?= $this->Number->format($product->id) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 "><?= h($product->product_title) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($product->product_description) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($product->category_id) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= $this->Html->image('/'.'upload/'.$product->product_image,['width'=>'100px','height'=>'100px'])?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($product->product_tags) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($product->status) ?></p>
                      </td>
                      <?php if ($product->status==2):?>
                    <td class= 'align-middle text-center text-sm'><?= $this->Form->postLink(__('InActive'), ['action' => 'productstatus', $product->id,$product->status], ['class'=>'badge badge-sm bg-gradient-danger'],['confirm' => __('Are you sure you want to Active # {0}?', $product->id)]) ?>
</td>                    <?php else:?>
          <td class= 'align-middle text-center text-sm'><?= $this->Form->postLink(__('Active'), ['action' => 'productstatus', $product->id,$product->status], ['class'=>'badge badge-sm bg-gradient-success'],['confirm' => __('Are you sure you want to InActive # {0}?', $product->id)]) ?>
            <?php endif;?>
            <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($product->created_date) ?></p></td>
                       <td> <p class="text-xs font-weight-bold mb-0 text-center"><?= h($product->modified_date) ?></p>
                      </td>
                      
                      <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'productview', $product->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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












