<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductCategory $productCategory
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
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Product Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productCategories form content">
            <?= $this->Form->create($productCategory) ?>
            <fieldset>
                <legend><?= __('Add Product Category') ?></legend>
                <?php
                    echo $this->Form->control('category_name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
  </div>
