<!DOCTYPE html>
<html lang="en">

<head>
<?php echo $this->Html->charset();?>
<?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php echo $this->Html->css('theme');?>
  <?php echo $this->Html->css('css/bootstrap-responsive.min.css');?>
  <?php echo $this->Html->css('css/bootstrap-responsive.min.css');?>
  <?php echo $this->Html->css('icons/css/font-awesome.css');?>
  <!-- <?php echo $this->Html->css('icons/css/font-awesome.css');?> -->
  <!-- <?php echo $this->Html->css('icons/css/font-awesome.css');?> -->
  <!-- <?php echo $this->Html->css('icons/css/font-awesome.css');?> -->
  <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

  <title>Form</title>


  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <link href="https://fonts.gstatic.com" rel="preconnect">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <?= $this->Html->css([
        'vendor/aos/aos',
        'vendor/bootstrap/css/bootstrap.min',
        'vendor/bootstrap-icons/bootstrap-icons',
        'vendor/boxicons/css/boxicons.min',
        'vendor/glightbox/css/glightbox.min',
        'vendor/remixicon/remixicon',
        'vendor/swiper/swiper-bundle.min',
        // 'normalize.min',
        // 'milligram.min',
        // 'cake',
        'style'
          
        ]) ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <?php echo $this->Html->script("jquery-1.9.1.min.js"); ?>
        <?php echo $this->Html->script("jquery.min.js"); ?>
        <?php echo $this->Html->script("jquery.validate.min.js"); ?>
           <?php echo $this->Html->script("script.js"); ?>
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

<?php echo $this->element('header');?>

  <!-- ======= Hero Section ======= -->
  <?php echo $this->element('hero');?>

  <!-- End Hero -->
<?php echo $this->fetch('content')?>
  <main id="main">

    
    <!-- ======= Services Section ======= -->
    <?php echo $this->element('service');?>

   <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->



    <!-- ======= Contact Section ======= -->
    <?php echo $this->element('contact');?>

    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php echo $this->element('footor');?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
     var csrfToken = $('meta[name="csrfToken"]').attr('content');
    </script>

<script>
    $('#selct').on('change', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });
        
        var data = $(this).val();
        $.ajax({
            url: "http://localhost:8765/users/index",
            data: {'status':data},
            type: "json",
            method: "get",
            success:function(response){
                // code will work in case of json retun from the ajax start here
                // res = JSON.parse(response);
                // var tabel_html = '<table><thead><tr><th>id</th><th>name</th><th>email</th><th>image</th><th>created_at</th><th> Actions</th></tr></thead>';
                // tabel_html += '<tbody>';
                // $.each(res, function (key, val) {
                //         tabel_html += '<tr><td>'+val.id+'</td><td>'+val.name+'</td><td>'+val.email+'</td><td></td><td></td><td class="actions"></td></tr>';
                    
                // })
                // tabel_html +='</tbody>';
                // tabel_html +='</table>';
                // $('.table-responsive').html(tabel_html);
                 // code will work in case of json retun from the ajax end here
                 
                // code will work in case cakephp element render start here \
                $('.table-responsive').html(response);
                // alert('jfdjg');
                // code will work in case cakephp element render end here 
            }
        });
    });
</script>



  <!-- Vendor JS Files -->




  <!-- Vendor JS Files -->
  <?= $this->Html->script([
        'vendor/aos/aos',
        'vendor/bootstrap/js/bootstrap.bundle.min',
        'vendor/glightbox/js/glightbox.min',
        'vendor/isotope-layout/isotope.pkgd.min',
        'vendor/swiper/swiper-bundle.min',
        'vendor/waypoints/noframework.waypoints',
        'vendor/php-email-form/validate',
        'main',


    ]);?>


  <!-- Template Main JS File -->
  <?php echo $this->Html->script('main.js')?>
  <?= $this->Html->script('jquery-1.9.1.min.js');?>
  <?= $this->Html->script('jquery-ui-1.10.1.custom.min.js');?>
  <?= $this->Html->script('flot/jquery.flot.js');?>
  <?= $this->Html->css('js/bootstrap.min.js');?>


</body>

</html>