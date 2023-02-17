
<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <?php echo $this->Html->css('nucleo-icons.css'); ?>
  <?php echo $this->Html->css('nucleo-svg.css'); ?>


  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <?php echo $this->Html->css('material-dashboard.css?v=3.0.4'); ?>
</head>

<body class="g-sidenav-show  bg-gray-200">
<?php echo $this->element('aside');?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <?php echo $this->element('nav');?>

    <!-- End Navbar -->

   <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                <h6 class="text-white text-capitalize ps-3">Following are the product related to this Category</h6>

              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <!-- <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3"> -->
                <h6 class="text-white text-capitalize ps-3"><?= $this->Html->link(__('Inactive all'), ['action' => 'inactive',$id], ['class' => 'button float-right']) ?>

            </h6>
              </div>
            </div>

                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">product_title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category id</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Image</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product tags</th>
                      
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Change Status</th> -->
                     <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($products->products as $product): 
                    if($product->status == 2){
                        continue;
                    }
                    ?>
                    <tr>
                      
                      <td>
                        <p class="text-xs font-weight-bold mb-0 "><?= $this->Number->format($product->id) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 "><?= h($product->product_title) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($product->product_description) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($product->category_id) ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= $this->Html->image('/'.'upload/'.$product->product_image,['width'=>'100px','height'=>'100px'])?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center"><?= h($product->product_tags) ?></p>
                      </td>
                      
                      
                        
                      
                      
                    </tr>
                    <?php endforeach; ?>
                   
                 
                  
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>












 
   
    <?php echo $this->element('footor');?>
   
   
      
    </div>
  </main>
  <?php echo $this->element('plugin');?>
  <!--   Core JS Files   -->
  <?php echo $this->Html->script('core/popper.min.js')?>
  <?php echo $this->Html->script('core/bootstrap.min.js')?>
  <?php echo $this->Html->script('plugins/perfect-scrollbar.min.js')?>
  <?php echo $this->Html->script('plugins/smooth-scrollbar.min.js')?>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>

<script>

$(document).ready(function(){
// alert('dfgfdg');
$("#key").on("keyup", function() {  
  var value = $(this).val().toLowerCase();  
  $("tr").filter(function() {
   $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});
});

</script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->

  <?php echo $this->Html->script('material-dashboard.min.js?v=3.0.4')?>

</body>

</html>
