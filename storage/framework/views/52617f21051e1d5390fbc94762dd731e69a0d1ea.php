<!-- BEGIN MENUTOP -->
   <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="<?php echo e(url('/')); ?>" class="active">Home</a></li>
                <li class="dropdown"><a href="<?php echo e(url('/shop')); ?>">Shop<i class="fa fa-angle-down"></i></a>
                  <ul role="menu" class="sub-menu">
                      <li><a href="<?php echo e(url('/shop')); ?>">Products</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo e(url('/account')); ?>">Account</a></li> 
                <li><a href="<?php echo e(url('/checkout')); ?>">Checkout</a></li>
                <li><a href="<?php echo e(route('product.shoppingCart')); ?>">Cart</a></li>
                <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
              </ul>
            </div>
            
          </div>
          <div class="col-sm-3">
            <div class="search_box pull-right">
              <input type="text" placeholder="Search"/>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->

<!-- END MENUTOP -->
