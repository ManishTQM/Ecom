<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AddCart $addCart
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $addCart->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $addCart->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Add Cart'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addCart form content">
            <?= $this->Form->create($addCart) ?>
            <fieldset>
                <legend><?= __('Edit Add Cart') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
                    echo $this->Form->control('quantity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
