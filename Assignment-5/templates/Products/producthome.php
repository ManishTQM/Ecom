<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>


<head>
    <?= $this->Html->css([
    
    'normalize.min',
    'milligram.min',
    'cake',
    'style'
      
    ]) ?>
     <?php echo $this->Flash->render() ?>
</head>
<body>
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
          <?= $this->Html->link(__('My Profile'), ['controller'=>'Users','action' => 'userdata',$user->users->id], ['class' => 'button float-right'] )  ?><br>
          
        
            <div class="container test">
                <div class="row">
                    <div class="col-12">

                    
  
                    <?php foreach ($product as $product): 
                                    if($product->status == 2){
                                        continue;
                                    }
                                    ?>

                        <div class="card">
                          
                          <?= $this->Html->image('/'.'upload/'.$product->product_image)?>
                          <div class="card-body">
                          <h5 class="card-title"><b>Product Id:- </b><?= $this->Number->format($product->id) ?></h5>
                             
                              <!-- <h5 class="card-title">Product Title</h5> -->
                              <h5 class="card-title"><b>Product Title:- </b><?= h($product->product_title) ?></h5>
                              <h5 class="card-title"><b>category Name:- </b><?= h($product->product_category->category_name) ?></h5>
                              
                              <h5 class="card-title"><b>Product Description:- <?= h($product->product_description) ?> </b>
                              <br>
                             
                              <a > <?= $this->Html->link(__('Product Details'), ['action' => 'view', $product->id]) ?></a><br>

                              <?php

                              if(empty($product->reaction)){ ?>

                              
                                        <a > <?= $this->Html->link(__('like'), ['action' => 'like', $product->id],['style'=>'color:grey']) ?></a>
                                        <a > <?= $this->Html->link(__('Dislike'), ['action' => 'dislike', $product->id],['style'=>'color:grey']) ?></a>
                                        <?php
                             }
                             ?>
                              <?php 
                                 $reactionarray = array();
                                 $a=0;$b=0;
                                 foreach($product->reaction as $reactions ){
                                     
                                     $reactionarray[] =+ $reactions->user_id;  

                                     $a= $a + $reactions->upvote ;
                                     $b= $b + $reactions->downvote;


                                 }
                                 if (in_array($result->id, $reactionarray)){
                                     foreach($product->reaction as $reaction ){
                                         if($reaction->user_id == $result->id && $reaction->product_id == $product->id){
                     
                                     if($reaction->upvote == 1){ ?>

                                        <?php  echo $a; ?>
                                        <a > <?= $this->Html->link(__('like'), ['action' => 'like', $product->id]) ?></a>
                                        <?php  echo $b; ?>
                                        <a > <?= $this->Html->link(__('Dislike'), ['action' => 'dislike', $product->id],['style'=>'color:grey']) ?></a>
                                        <?php
                             }
                          
                             else if($reaction->downvote == 1){
                              ?>
                              <?php  echo $a; ?>
                              <a > <?= $this->Html->link(__('like'), ['action' => 'like', $product->id],['style'=>'color:grey']) ?></a>
                              <?php  echo $b; ?>
                              <a > <?= $this->Html->link(__('Dislike'), ['action' => 'dislike', $product->id]) ?></a> <?php 
                              }else{
                                echo $a; ?>
                              <a > <?= $this->Html->link(__('like'), ['action' => 'like', $product->id],['style'=>'color:grey']) ?></a>
                              <?php  echo $b; ?>
                              <a > <?= $this->Html->link(__('Dislike'), ['action' => 'dislike', $product->id],['style'=>'color:grey']) ?></a> 

                            <?php
                              }
                            
                            }}}
                            else{
                        ?>
                        <?php  echo $a; ?>
                        <a > <?= $this->Html->link(__('like'), ['action' => 'like', $product->id],['style'=>'color:grey']) ?></a>
                        <?php  echo $b; ?>
                      <a > <?= $this->Html->link(__('Dislike'), ['action' => 'dislike', $product->id],['style'=>'color:grey']) ?></a>
                        <?php
                    }?>
                              
                            </div>
                            
                          </div>

                         
                          <?php 
                              endforeach;?>
                          </div>
                          
                    </div>
        
            </div>    
            </div>
            
 
      
     
</body>
<style>
.card {
    border: 4px solid darkred;
    margin: 4rem;
    text-align: center;
    padding: 29px;
    border-radius:24px;
} 
.container.test{  
    width: 53rem;
}
.bnt {
    margin: 13px;
}
button {
    padding: 0px 13px !important;
}
.services .icon-box {
    padding: 71px 39px !important;
  
} </style>