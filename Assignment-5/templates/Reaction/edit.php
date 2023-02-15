<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reaction $reaction
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
                ['action' => 'delete', $reaction->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reaction->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Reaction'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reaction form content">
            <?= $this->Form->create($reaction) ?>
            <fieldset>
                <legend><?= __('Edit Reaction') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('upvote');
                    echo $this->Form->control('downvote');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
