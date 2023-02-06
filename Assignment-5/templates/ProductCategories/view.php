<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductCategory $productCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product Category'), ['action' => 'edit', $productCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product Category'), ['action' => 'delete', $productCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Product Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productCategories view content">
            <h3><?= h($productCategory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category Name') ?></th>
                    <td><?= h($productCategory->category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($productCategory->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productCategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Users Id') ?></th>
                    <td><?= $productCategory->users_id === null ? '' : $this->Number->format($productCategory->users_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($productCategory->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($productCategory->modified_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
