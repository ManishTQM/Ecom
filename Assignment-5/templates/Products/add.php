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

<div class="row">
<div class="container">
  
    <div class="column-responsive column-80">
        <div class="products form content">

          
            <!-- <?= $this->Form->create($product) ?> -->
            <?php  echo $this->Form->create($product,['type'=>'file']);?>

            <fieldset>
                <legend><h2 style="text-align:center;"><?= __('Add Product') ?><h2></legend>
                <h3><?php $session = $this->request->getSession();
                echo $session->read('email');
                error_reporting(0);

                ?></h3>
                <?php
                    echo $this->Form->control('product_title');
                    echo $this->Form->control('product_description');
                    echo '<h5>Chose Categories<h5>';
                   echo' <select name="category_id">';
                     foreach($productcategories as $productCategorie):?>
                    <option  value=<?=h($productCategorie->id)?>><?=h($productCategorie->category_name)?></option>
                    <?php endforeach;
                  echo '</select>';
                    // echo $this->Form->control('product_category');
                    echo $this->Form->control('images',['type'=>'file']);
                    echo $this->Form->control('product_tags');
                    echo $this->Form->control('price');
                    // echo $this->Form->control('status');
                    // echo $this->Form->control('created_date');
                    // echo $this->Form->control('modified_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
                     </div>
</div>
