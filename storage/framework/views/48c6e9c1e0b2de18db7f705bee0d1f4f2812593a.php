
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo e($setting->description_site); ?>">
    <meta name="author" content="Gerza Salas">
    <title><?php echo e($setting->title_site); ?></title>
    <meta name="keywords" content="<?php echo e($setting->keywords_site); ?>">
    <?php /* 
   <!--
    <meta name="keywords" content="electronics, miami, sales">
    <meta name="keywords" content="Hookah, miami, sales">
    
    <meta name="keywords" content="Hookah, miami, sales">
    <title>.:: Doral | Hookah ::.</title>
    <title>.||| <?php echo e(dd($settings->title_site)); ?> ::.</title> --> 

    */ ?>
    <link href="<?php echo e(URL::to('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('css/prettyPhoto.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('css/price-range.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('engine_modal/sweetalert.css')); ?>" rel="stylesheet">


    <!--
    <link href="<?php echo e(URL::to('css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('css/main1.css')); ?>" rel="stylesheet">
    <link href="css/<?php echo e($setting->css_site); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('css/main_doralhookah.css')); ?>" rel="stylesheet">
    
    -->    
  
  
  <link href="<?php echo e(URL::to('css/'.$setting->css_site)); ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(URL::to('images/favicon.ico')); ?>">

 <?php echo $__env->make('layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    
</head><!--/head-->

<body>

<!-- BEGIN HEADER -->
  <header id="header"><!--header-->
 <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- END HEADER -->

<!-- END MENUTOP -->
<?php if( $setting->dark_menu == 0): ?>
  <?php echo $__env->make('layouts.menutop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>{
  <?php echo $__env->make('layouts.menutop_dark', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
}
<?php endif; ?>

   </header><!--/header-->
<!-- END MENUTOP -->

<?php if(Session::has('modal_ask')): ?>
      <?php echo e(Session::get('modal_ask')); ?>

<?php endif; ?>

<?php if(Session::has('message')): ?>

   <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-12">          
              <div class="alert alert-danger">
                <?php echo e(Session::get('message')); ?>

              </div>            
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->

<?php endif; ?>

<!-- BEGIN BANNER -->
 <?php echo $__env->make('layouts.banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- END BANNER -->

<!-- BEGIN BODY -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">

          <!-- BEGIN SIDEBAR -->
          <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <!-- END SIDEBAR -->
        
          <!-- BEGIN CONTENT -->         
          <?php echo $__env->make('layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <!-- END CONTENT -->  


        </div>
      </div>
    </div>
  </section>
<!-- END BODY -->

<!-- BEGIN FOOTER -->
 <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- END FOOTER -->
   
  <script src="<?php echo e(URL::to('js/jquery.js')); ?>"></script>
  <script src="<?php echo e(URL::to('js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(URL::to('js/jquery.scrollUp.min.js')); ?>"></script>
  <script src="<?php echo e(URL::to('js/price-range.js')); ?>"></script>
  <script src="<?php echo e(URL::to('js/jquery.prettyPhoto.js')); ?>"></script>
  <script src="<?php echo e(URL::to('js/main.js')); ?>"></script>
    <script src="<?php echo e(URL::to('engine_modal/sweetalert-dev.js')); ?>"></script> 
 <?php echo $__env->make('layouts.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    



<!-- BEGIN MODAL ASK OVER +18 -->
<?php if( $setting->modal_ask == 1): ?>

  <?php if(!Session::has('modal_ask')): ?>
    <script>

      var token = '<?php echo e(Session::token()); ?>';
      var url = '<?php echo e(route('setmodalask')); ?>';    
      var urlu = '<?php echo e(route('unsetmodalask')); ?>';

      //$setting->modal_ask == 0
      swal({
        title: "Are you 18 or over?",
        text: "You must be 18 or over to enter this website.!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes!',
        cancelButtonText: "No!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm){

          $.ajax({
            method: "POST",
            url: url,
            //data: dataString,
            data: { _token: token},
            success: function(data) {
             console.log(data);
            }
          });

          swal("Welcome!", "", "success");
        //window.location = "http://google.com";
        } else {

          $.ajax({
            method: "POST",
            url: urlu,
            //data: dataString,
            data: { _token: token},
            success: function(data) {
             console.log(data);
            }
          });
        
          window.location = "http://google.com";
          //swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
    </script>
  <?php endif; ?>

<?php endif; ?>
<!-- END MODAL ASK OVER +18 -->


</body>
</html>


