<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
  <?= $this->Html->css([
    
    'normalize.min',
    'milligram.min',
    'cake',
    'style'
      
    ]) ?>
     <?php echo $this->Flash->render() ?>
     <?php $session = $this->request->getSession();
echo $session->read('email');
error_reporting(0);

?>
<div class="row">
<div class="container">

   
    <div class="column-responsive column-80">
        <div class="products form content">
        <?php  echo $this->Form->create($product,['type'=>'file']);?>
            <fieldset>
                <legend><?= __('Edit Product') ?></legend>
                <?php
                    echo $this->Form->control('product_title');
                    echo $this->Form->control('product_description');
                    echo '<h5>Chose Categories<h5>';
                    echo' <select name="category_id">';
                      foreach($productcategories as $productCategorie):?>
                     <option  value=<?=h($productCategorie->id)?>><?=h($productCategorie->category_name)?></option>
                     <?php endforeach;
                   echo '</select>';
                   echo $this->Form->control('images',['type'=>'file']);
                   echo $this->Form->control('product_tags');
                   
                
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
                      </div>
</div>
