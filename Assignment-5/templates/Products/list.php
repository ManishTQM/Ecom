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
     <?php echo $this->Flash->render() ?>


<div class="products index content">
<div class="container-fluid">
<div class="row">
  
  <div class="products index content col-sm-12">
  <div>
  <h3 style="text-align:center;"><b>Welcome Users</b></h3><?php echo $this->Flash->render() ?>
         Loged In Users Id :- <?php $session = $this->request->getSession();
echo $session->read('email');
error_reporting(0);

 ?></div><br>
  <?= $this->Html->link(__('My Profile'), ['controller'=>'Users','action' => 'userdata',$user->users->id], ['class' => 'button float-right'] )  ?>
  

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
                    <th><?= $this->Paginator->sort('Products Details') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($product as $product): ?>
                <tr>
                    <td><?= $this->Number->format($product->id) ?></td>
                    <td><?= h($product->product_title) ?></td>


                    <td><?= h($product->product_description) ?></td>
                    <td><?= h($product->category_id) ?></td>
                    <td ><?= $this->Html->image('/'.'upload/'.$product->product_image,['width'=>'100px','height'=>'100px'])?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
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
                
