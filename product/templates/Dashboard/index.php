<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>

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
    <?php echo $this->element('/Dashboard/footor');?>
   
  </main>
  <?php echo $this->element('/Dashboard/plugin');?>

  
  <!--   Core JS Files   -->
  <?php echo $this->Html->script('/core/popper.min.js')?>
  <?php echo $this->Html->script('/core/bootstrap.min.js')?>
  <?php echo $this->Html->script('/plugins/perfect-scrollbar.min.js')?>
  <?php echo $this->Html->script('/plugins/smooth-scrollbar.min.js')?>
  <?php echo $this->Html->script('/plugins/chartjs.min.js')?>
  <?php echo $this->Html->script('/core/function.js')?>

 
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script> -->
  <?php echo $this->Html->script('material-dashboard.min.js?v=3.0.4')?>
</body>

</html>