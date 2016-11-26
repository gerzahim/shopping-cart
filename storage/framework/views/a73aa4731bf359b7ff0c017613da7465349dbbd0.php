<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php echo e($setting->description_site); ?>">
    <meta name="author" content="Gerza Salas">
    <title><?php echo e($setting->title_site); ?></title>
    <meta name="keywords" content="<?php echo e($setting->keywords_site); ?>">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>
    <link rel="shortcut icon" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(URL::to('images/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(URL::to('images/favicon.ico')); ?>">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <?php /* 
                <!-- Collapsed Hamburger 
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>--> */ ?>

                <!-- Branding Image -->
                <a href="<?php echo e(url('/')); ?>">
                        <?php /* 
                        <!--
                        <img height="50px" width="60px" src="<?php echo e(URL::to('images/Logoherbnkulture.png')); ?>" />
                        <img height="80px" width="90px" src="<?php echo e(URL::to('images/CrownTrading.png')); ?>" />
                        <img height="50px" width="120px" src="<?php echo e(URL::to('images/Logosolodoral.jpg')); ?>" />
                        -->
                        */ ?>
                        <img width="<?php echo e($setting->logo_admin_width); ?>px" height="<?php echo e($setting->logo_admin_height); ?>px" src="<?php echo e(URL::to('images/')); ?>/<?php echo e($setting->logo_admin); ?>" alt="" />
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>


                          <?php if($setting->approve_user == '1'): ?>
                            <li><a href="<?php echo e(url('/loginap')); ?>"><i class="fa fa-lock"></i> Login</a></li>
                          <?php else: ?>
                            <li><a href="<?php echo e(url('/login')); ?>"><i class="fa fa-lock"></i> Login</a></li>
                          <?php endif; ?>                     
                          <?php if($setting->kind_web == '2'): ?>
                            <li><a href="<?php echo e(url('/signupw')); ?>"><i class="fa fa-briefcase"></i> Wholesale Registration</a></li>
                          <?php else: ?>
                            <li><a href="<?php echo e(url('/register')); ?>"><i class="fa fa-user"></i> Join Now</a></li> 
                          <?php endif; ?>    
                          <?php /* 
                          <!-- 
                            <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                            -->
                            */ ?>                          
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
</body>
</html>
