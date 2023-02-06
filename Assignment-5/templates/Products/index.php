<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
  <?= $this->Html->css([
    
    'normalize.min',
    'milligram.min',
    'cake',
    'style'
      
    ]) ?>
 

<div class="products index content">
<div class="container-fluid">
<div class="row">
        <div class="products index content col-sm-2">
        <?php echo $this->Flash->render() ?>
   <h3>  <?php $session = $this->request->getSession();
echo $session->read('email');
error_reporting(0);

?></h3> 

        <?php echo $this->element('sidebar');?>
  </div>
  <div class="products index content col-sm-10">

    <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_title') ?></th>
                    <th><?= $this->Paginator->sort('product_description') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('product_image') ?></th>
                    <th><?= $this->Paginator->sort('product_tags') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('Product Active/Inactive') ?></th>

                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $this->Number->format($product->id) ?></td>
                    <td><?= h($product->product_title) ?></td>
                    <td><?= h($product->product_description) ?></td>
                    <td><?= h($product->category_id) ?></td>
                    
                    <!-- <td><?= $product->product_category === null ? '' : $this->Number->format($product->product_category) ?></td> -->
               
                    <td ><?= $this->Html->image('/'.'upload/'.$product->product_image,['width'=>'100px','height'=>'100px'])?></td>

                    <td><?= h($product->product_tags) ?></td>
                    <td><?= h($product->status) ?></td>
                    <?php if ($product->status==2):?>
                    <td><?= $this->Form->postLink(__('InActive'), ['action' => 'productstatus', $product->id,$product->status], ['confirm' => __('Are you sure you want to Active # {0}?', $product->id)]) ?>
</td>                    <?php else:?>
          <td><?= $this->Form->postLink(__('Active'), ['action' => 'productstatus', $product->id,$product->status], ['confirm' => __('Are you sure you want to InActive # {0}?', $product->id)]) ?>
            <?php endif;?>
                    <td><?= h($product->created_date) ?></td>
                    <td><?= h($product->modified_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__(''), ['action' => 'productview', $product->id],['class'=>"fa-solid fa-eye"]) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $product->id],['class'=>"fa-solid fa-pen-to-square"]) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $product->id],['class'=>"fa-solid fa-trash"], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
       
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
    </div>
                
</div>
                
