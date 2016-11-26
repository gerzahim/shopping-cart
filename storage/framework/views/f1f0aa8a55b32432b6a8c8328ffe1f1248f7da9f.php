<!-- BEGIN MENUTOP -->
   <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">

          <div class="col-sm-8">
     <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
        
                <div class="collapse navbar-collapse navbar-left">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo e(url('/')); ?>"">Home</a></li>
                        <li class="dropdown">
                            <a href="<?php echo e(url('/shop')); ?>" class="dropdown-toggle" data-toggle="dropdown">Shop <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(url('/shop')); ?>">Products</a></li>
                            </ul>
                        </li>                        
                        <li><a href="<?php echo e(url('/account')); ?>">Account</a></li> 
                        <li><a href="<?php echo e(url('/checkout')); ?>">Checkout</a></li>
                        <li><a href="<?php echo e(route('product.shoppingCart')); ?>">Cart</a></li>
                        <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
                 
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
            
          </div>
          <div class="col-sm-4">
            <div class="search_box pull-right">
            <form action="<?php echo e(url('search')); ?>" id="main-contact-form" class="searchformhh" name="contact-form" method="get">
              <input type="text" name="search" id="search" placeholder="Search"/>
              <button type="submit" class=""><i class="fa fa-search" aria-hidden="true"></i></button>  
              <?php echo e(csrf_field()); ?> 
            </form>
            </div>
          </div>

        </div>
      </div>
    </div><!--/header-bottom-->
<!-- END MENUTOP -->
