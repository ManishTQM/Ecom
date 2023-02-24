<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AddCart $addCart
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Add Cart'), ['action' => 'edit', $addCart->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Add Cart'), ['action' => 'delete', $addCart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addCart->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Add Cart'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Add Cart'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addCart view content">
            <h3><?= h($addCart->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $addCart->has('user') ? $this->Html->link($addCart->user->id, ['controller' => 'Users', 'action' => 'view', $addCart->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $addCart->has('product') ? $this->Html->link($addCart->product->id, ['controller' => 'Products', 'action' => 'view', $addCart->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($addCart->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $addCart->quantity === null ? '' : $this->Number->format($addCart->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
