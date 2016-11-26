<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator | <?php echo e($setting->name_site); ?></title>
    <meta name="description" content="<?php echo e($setting->description_site); ?>">
    <meta name="author" content="Gerza Salas">
    <meta name="keywords" content="<?php echo e($setting->keywords_site); ?>">

	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo e(URL::to('css/bootstrap.min.css')); ?>" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo e(URL::to('css/font-awesome.min.css')); ?>" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo e(URL::to('css/custom_admin.css')); ?>" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 

    
    <link rel="shortcut icon" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(URL::to('images/favicon.ico')); ?>">    
    <link rel='stylesheet' href='//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css'>   
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php /* 
                        <!--
                        <img height="80px" width="90px" src="<?php echo e(URL::to('images/CrownTrading.png')); ?>" />
                        <img height="50px" width="60px" src="<?php echo e(URL::to('images/Logoherbnkulture.png')); ?>" />
                        <img height="50px" width="120px" src="<?php echo e(URL::to('images/Logosolodoral.jpg')); ?>" />
                        -->
                        */ ?>
                        <img width="<?php echo e($setting->logo_admin_width); ?>px" height="<?php echo e($setting->logo_admin_height); ?>px" src="<?php echo e(URL::to('images/')); ?>/<?php echo e($setting->logo_admin); ?>" alt="" />
                    </a>
                </div>
              
                 <span class="logout-spn" >
                  <a href="<?php echo e(url('/logout')); ?>" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

                     <li >
                        <a href="<?php echo e(url('/admin')); ?>" ><i class="fa fa-desktop"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/orders')); ?>"><i class="fa fa-archive"></i>Orders</a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/categories')); ?>"><i class="fa fa-qrcode"></i>Categories</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo e(url('/banners')); ?>"><i class="fa fa-film"></i>Banner</a>
                    </li>                    
                    <?php /* <!-- 

                    // 
                    <li class="active-link">
                        <a href="blank.html"><i class="fa fa-edit "></i>Blank Page  <span class="badge">Included</span></a>
                    </li>
                             <a href="<?php echo e(url('/banners')); ?>" >
                                <i class="fa fa-film fa-5x"></i>
                                <h4>Banner Home</h4>
                              </a>                    
                    --> */ ?>  
                        <li>
                            <a href="<?php echo e(url('/brands')); ?>"><i class="fa fa-rocket"></i>Brands</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/states')); ?>"><i class="fa fa-flag"></i>Tax States</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/product')); ?>"><i class="fa fa-tags"></i>Products</a>
                        </li>                         
                        <li>
                            <a href="<?php echo e(url('/attributes')); ?>"><i class="fa fa-puzzle-piece"></i>Products Attributes</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/associates')); ?>"><i class="fa fa-code-fork"></i>Associates Products </a>
                        </li>                                                                           

                        <li>
                            <a href="<?php echo e(url('/users')); ?>"><i class="fa fa-user"></i>Users</a>
                        </li>  
                        <li>
                            <a href="<?php echo e(url('/subscribers')); ?>"><i class="fa fa-users"></i>Subscribers</a>
                        </li> 
                        <li>
                            <a href="<?php echo e(url('/shipping-admin')); ?>"><i class="fa fa-truck"></i>Shipping Cost</a>
                        </li>                                                                                                 
                        <li>
                            <a href="<?php echo e(url('/settingedit/1')); ?>"><i class="fa fa-cog"></i>Settings</a>
                        </li>
                </ul>
            </div>
        </nav>

        <!-- /. NAV SIDE  -->
        <?php echo $__env->make('admin.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
    </div>

    
      <!-- 

     <div class="footer">  
    
             <div class="row">
                <div class="col-lg-12" >
          <p class="pull-left">Copyright &copy; <?php /* echo date("Y") */ ?> . All rights reserved.</p>
          <p class="pull-right">Designed by Gerza Salas <span>rasce88@gmail.com</span></p>                    
                </div>
        </div>
        </div>  
    -->
       

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo e(URL::to('js/jquery-1.10.2.js')); ?>"></script>
    
    <script type="text/javascript">
        $("#checkAll").change(function () {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });
    </script>    

    <!--
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#products').DataTable();
        });
    </script>
    -->


    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo e(URL::to('js/bootstrap.min.js')); ?>"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo e(URL::to('js/custom.js')); ?>"></script>


</body>
</html>
