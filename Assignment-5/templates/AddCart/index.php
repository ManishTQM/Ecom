<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AddCart> $addCart
 */
?>
 <?= $this->Html->css([
    
    'normalize.min',
    'milligram.min',
    'cake',
    'style'
      
    ]) ?>
<div class="addCart index content">
        <?= $this->Html->link(__('Back'), ['controller'=>'products','action' => 'producthome'], ['class' => 'button float-right']) ?>
        <?php echo $this->Flash->render() ?>

    <h3><?= __('Add Cart') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= h('id') ?></th>
                    <th><?= h('user_id') ?></th>
                    <th><?= h('product_id') ?></th>
                    <th><?= h('quantity') ?></th>
                    <th class="actions"><?= __('Delete') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($addCart as $addCart): ?>
                <tr>
                    <td><?= $this->Number->format($addCart->id) ?></td>
                    <td><?= $addCart->has('user') ? $this->Html->link($addCart->user->id, ['controller' => 'Users', 'action' => 'view', $addCart->user->id]) : '' ?></td>
                    <td><?= $addCart->has('product') ? $this->Html->link($addCart->product->id, ['controller' => 'Products', 'action' => 'view', $addCart->product->id]) : '' ?></td>
                    <td>
                    <?= $this->Html->link(__('-'), ['action' => 'decrease', $addCart->id]) ?>
                    <?= $addCart->quantity === null ? '' : $this->Number->format($addCart->quantity) ?>
                    <?= $this->Html->link(__('+'), ['action' => 'edit', $addCart->id]) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $addCart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addCart->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
   
</div>
