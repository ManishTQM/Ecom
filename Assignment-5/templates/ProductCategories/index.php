<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ProductCategory> $productCategories
 */
?>
  <?= $this->Html->css([
    
    'milligram.min',
    'cake',
    'style'
      
]) ?>
     <?php echo $this->Flash->render() ?>
 <div class="container-fluid">  
<div class="productCategories index content">
<div class="row">
        <div class="products index content col-sm-2">

        <?php echo $this->element('sidebar');?>
  </div>
  <div class="products index content col-sm-10">
  <!-- <?= $this->Html->link(__('New Product Category'), ['controller'=>'ProductCategories','action' => 'add'], ['class' => 'button float-right']) ?> -->

    <?= $this->Html->link(__('New Product Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Product Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('users_id') ?></th>
                    <th><?= $this->Paginator->sort('category_name') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th><?= $this->Paginator->sort('Change Status') ?></th>

                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productCategories as $productCategory): ?>
                <tr>
                    <td><?= $this->Number->format($productCategory->id) ?></td>
                    <td><?= $productCategory->users_id === null ? '' : $this->Number->format($productCategory->users_id) ?></td>
                    <td><?= h($productCategory->category_name) ?></td>
                    <td><?= h($productCategory->status) ?></td>
                    <td><?= h($productCategory->created_date) ?></td>
                    <td><?= h($productCategory->modified_date) ?></td>
                    <?php if ($productCategory->status==2):?>
                    <td><?= $this->Form->postLink(__('InActive'), ['action' => 'userstatus', $productCategory->id,$productCategory->status], ['confirm' => __('Are you sure you want to Active # {0}?',  $productCategory->id)]) ?>
</td>                    <?php else:?>
          <td><?= $this->Form->postLink(__('Active'), ['action' => 'userstatus',$productCategory->id,$productCategory->status], ['confirm' => __('Are you sure you want to InActive # {0}?',  $productCategory->id)]) ?>
            <?php endif;?>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productCategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
</div>  
