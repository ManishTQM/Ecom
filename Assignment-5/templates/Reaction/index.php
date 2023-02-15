<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Reaction> $reaction
 */
?>
<div class="reaction index content">
    <?= $this->Html->link(__('New Reaction'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reaction') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('upvote') ?></th>
                    <th><?= $this->Paginator->sort('downvote') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reaction as $reaction): ?>
                <tr>
                    <td><?= $this->Number->format($reaction->id) ?></td>
                    <td><?= $reaction->has('user') ? $this->Html->link($reaction->user->id, ['controller' => 'Users', 'action' => 'view', $reaction->user->id]) : '' ?></td>
                    <td><?= $reaction->has('product') ? $this->Html->link($reaction->product->id, ['controller' => 'Products', 'action' => 'view', $reaction->product->id]) : '' ?></td>
                    <td><?= $this->Number->format($reaction->upvote) ?></td>
                    <td><?= $this->Number->format($reaction->downvote) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reaction->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reaction->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reaction->id)]) ?>
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
