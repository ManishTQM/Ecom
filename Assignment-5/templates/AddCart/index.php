

<!DOCTYPE html>
<html>
    <head>
        <style>
            .shopping-cart{
	padding-bottom: 50px;
	font-family: 'Montserrat', sans-serif;
}
.cart-img {
    width: 100px;
}

.shopping-cart.dark{
	background-color: #f6f6f6;
}

.shopping-cart .content{
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
	background-color: white;
}

.shopping-cart .block-heading{
    padding-top: 50px;
    margin-bottom: 40px;
    text-align: center;
}

.shopping-cart .block-heading p{
	text-align: center;
	max-width: 420px;
	margin: auto;
	opacity:0.7;
}

.shopping-cart .dark .block-heading p{
	opacity:0.8;
}

.shopping-cart .block-heading h1,
.shopping-cart .block-heading h2,
.shopping-cart .block-heading h3 {
	margin-bottom:1.2rem;
	color: #3b99e0;
}

.shopping-cart .items{
	margin: auto;
}

.shopping-cart .items .product{
	margin-bottom: 20px;
	padding-top: 20px;
	padding-bottom: 20px;
}

.shopping-cart .items .product .info{
	padding-top: 0px;
	text-align: center;
}

.shopping-cart .items .product .info .product-name{
	font-weight: 600;
}

.shopping-cart .items .product .info .product-name .product-info{
	font-size: 14px;
	margin-top: 15px;
}

.shopping-cart .items .product .info .product-name .product-info .value{
	font-weight: 400;
}

.shopping-cart .items .product .info .quantity .quantity-input{
    margin: auto;
    width: 80px;
}

.shopping-cart .items .product .info .price{
	margin-top: 15px;
    font-weight: bold;
    font-size: 22px;
 }

.shopping-cart .summary{
	border-top: 2px solid #5ea4f3;
    background-color: #f7fbff;
    height: 100%;
    padding: 30px;
}

.shopping-cart .summary h3{
	text-align: center;
	font-size: 1.3em;
	font-weight: 600;
	padding-top: 20px;
	padding-bottom: 20px;
}

.shopping-cart .summary .summary-item:not(:last-of-type){
	padding-bottom: 10px;
	padding-top: 10px;
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.shopping-cart .summary .text{
	font-size: 1em;
	font-weight: 600;
}

.shopping-cart .summary .price{
	font-size: 1em;
	float: right;
}

.shopping-cart .summary button{
	margin-top: 20px;
}

@media (min-width: 768px) {
	.shopping-cart .items .product .info {
		padding-top: 25px;
		text-align: left; 
	}

	.shopping-cart .items .product .info .price {
		font-weight: bold;
		font-size: 22px;
		top: 17px; 
	}

	.shopping-cart .items .product .info .quantity {
		text-align: center; 
	}
	.shopping-cart .items .product .info .quantity .quantity-input {
		padding: 4px 10px;
		text-align: center; 
	}
}

            </style>
        <title>Shopping Cart</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
    <main class="page">
        <section class="shopping-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Shopping Cart</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
		        </div>
		        <div class="content">
                    <div class="row" id="cart-hide">
                        <div class="col-md-12 col-lg-8">
							<div class="items" >
							<?php $a= count($addCart)?>
								<?php if(count($addCart)>0){?>
									<?php $total= 0;?>
									<?php $discount=10?>
								<?php $shipping=40?>
								<?php foreach ($addCart as $addCart): ?>
									<?php  $total = $total+$addCart->product->price*$addCart->quantity?>
									<?php $d=$total/$discount ?>
									<div class="row" id = 'cart<?php echo $addCart->id?>'>
									<div class="product">
									<div class="col-md-3">
									<?= $this->Html->image('/'.'upload/'.$addCart->product->product_image,['class'=>'cart-img'])?><br><br>
									</div>
									<div class="col-md-8">
											<div class="info">
												<div class="row">
													<div class="col-md-5 product-name">
														<div class="product-name">
															<a href="#"><?=h($addCart->product->product_title)?></a>
															<div class="product-info">
															<div>Description: <span class="value"><?=h($addCart->product->product_description)?></span></div>
															<div>tags: <span class="value"><?=h($addCart->product->product_tags)?></span></div>
															</div>
														</div>
													</div>
													<div class="col-md-4 quantity">
													<a href="javascript:void(0)" class="btn btn-danger decrease" data-id="<?= $addCart->id ?>">-</a>
													<?= $addCart->quantity === null ? '' : $this->Number->format($addCart->quantity) ?>
													<a href="javascript:void(0)" class="btn btn-danger increase" data-id="<?= $addCart->id ?>">+</a><br><br>
													<a href="javascript:void(0)" class="btn btn-danger delete" data-id="<?= $addCart->id ?>">delete</a>
													</div>
													<div class="col-md-3 price">
													
													<span><?=h($addCart->product->price*$addCart->quantity)?></span>
													</div>
													</div>
											</div>
											</div>
									</div>
								</div>
								<?php endforeach; ?>
								<div class="col-md-12 col-lg-4">
									<div class="summary">
									<h3>Summary</h3>
									<div class="summary-item"><span class="text">Subtotal</span><span class="price">   <?php echo $total ?></span></div>
									<div class="summary-item"><span class="text">Discount</span><span class="price"> <?php echo $d; ?></span></div>
										<div class="summary-item"><span class="text">Shipping</span><span class="price"><?php echo $shipping; ?></span></div>
										<div class="summary-item"><span class="text">Total</span><span class="price">   <?php echo $total-$d+$shipping ?></span></div>
										<button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
									</div>
								</div>
		 			        </div> 
							 </div> 
							 </div>
						<?php	}else{
							echo "your cart has been empty";
						}?>
		 		</div>
	 		</div>
		</section>
	</main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		var csrfToken = $('meta[name="csrfToken"]').attr('content');
		$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });
	$('.delete').on('click',function(){
		
		var id= $(this).attr('data-id');
		// alert(id);
		// var hide = $(this).parents('#cart');
		$.ajax({
			url:"/AddCart/delete",
			data:{'id':id},
			type:"JSON",
			method:'get',
			success:function(response){
				if(response=='delete'){
					// hide.hide();
					// $('#cart'+id).hide();
					 $('#cart-hide').load('/AddCart/index','#cart-hide');
				}
			}

		});
	

		});
	$('.decrease').on('click',function(){
		
		var id= $(this).attr('data-id');
		
		$.ajax({
			url:"/AddCart/decrease",
			data:{'id':id},
			type:"JSON",
			method:'get',
			success:function(response){
				if(response=='decreased'){
					$('#cart-hide').load('/AddCart/index','#cart-hide');
				}
			}

		});
	

		});
		$('.increase').on('click',function(){
		
		var id= $(this).attr('data-id');
		// alert(id);
		
		$.ajax({
			url:"/AddCart/increase",
			data:{'id':id},
			type:"JSON",
			method:'get',
			success:function(response){
				if(response=='increased'){
					$('#cart-hide').load('/AddCart/index','#cart-hide');
				}
			}

		});
	

		});
		




	});
	</script>
</body>
</html>



