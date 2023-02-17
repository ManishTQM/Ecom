


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
  <?= $this->Html->css(['cake']) ?>
  <!-- Nucleo Icons -->
  <?php echo $this->Html->css('nucleo-icons.css'); ?>
  <?php echo $this->Html->css('nucleo-svg.css'); ?>

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <?php echo $this->Html->css('material-dashboard.css?v=3.0.4'); ?>
  <style>.error{

    color:red;
  }</style>

</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <?php echo $this->element('aside');?>
      <div class="col-12">
        <!-- Navbar -->
      </div>
    </div>
  </div>
  <section>

      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <?php echo $this->Flash->render() ?>
                  <h4 class="font-weight-bolder">Edit</h4>

                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body">
                <?php  echo $this->Form->create($user,['type'=>'file']);?>
                    <div class="input-group input-group-outline mb-3">
                    
                     <?php echo $this->Form->control('user_profile.first_name',['required'=>false,'class'=>"form-control"]);?>

                    </div>
                    <div class="input-group input-group-outline mb-3">
                    
                     <?php echo $this->Form->control('user_profile.last_name',['required'=>false,'class'=>"form-control"]);?>

                    </div>
                    <div class="input-group input-group-outline mb-3">
                    
                     <?php echo $this->Form->control('user_profile.images',['type'=>'file'])  ;?>

                    </div>
                    <div class="input-group input-group-outline mb-3">
                    
                     <?php echo $this->Form->control('user_profile.contact',['required'=>false,'class'=>"form-control"]);?>

                    </div>
                    <div class="input-group input-group-outline mb-3">
                    
                     <?php echo $this->Form->control('user_profile.address',['required'=>false,'class'=>"form-control"]);?>

                    </div>
                    <div class="input-group input-group-outline mb-3">
                     
                      <?php echo $this->Form->control('email',['required'=>false,'class'=>"form-control"]);?>

                    </div>
                    <div class="input-group input-group-outline mb-3">
                    <?php echo $this->Form->control('password',['required'=>false,'class'=>"form-control"]);?>

                    </div>
                    <input type="checkbox" id="chkterms" />Terms & Conditions
                    <!-- <div class="form-check form-check-info text-start ps-0">
                          <div class="form-check form-check-info text-start ps-0">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                          I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                          </label>
                          </div>
                    </div> -->
                    <div style="display:none; color:red" id="agree_chk_error">
  Can't proceed as you didn't agree to the terms!
  </div>
                    <div class="text-center">
                    <?= $this->Form->button('Submit',['class'=>'btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0','id'=>'btncheck']) ?>

                      <!-- <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button> -->
                    </div>
                    <?= $this->Form->end() ?>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <main class="main-content  mt-0">
   
  </main>
  <!--   Core JS Files   -->
  <?php echo $this->Html->script('/core/popper.min.js'); ?>
  <?php echo $this->Html->script('/core/bootstrap.min.js'); ?>
  <?php echo $this->Html->script('/plugins/perfect-scrollbar.min.js'); ?>
  <?php echo $this->Html->script('/plugins/smooth-scrollbar.min.js'); ?>
  
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#btncheck').click(function() {
                if (!$('#chkterms').is(':checked')) {
                    $("#agree_chk_error").show();
                    return false;
                  }
                  else {
                    $("#agree_chk_error").hide();
                    // return false;
                }
            })
        })
    </script>


  <?php echo $this->Html->script('material-dashboard.min.js?v=3.0.4'); ?>

</body>

</html>
