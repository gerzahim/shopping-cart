<?php echo $__env->make('layouts.sidebar1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
  
  <?php if(Session::has('success')): ?>
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
      <div id="charge-message" class="alert alert-success">
        <?php echo e(Session::get('success')); ?>        
      </div>
    </div>
  <?php endif; ?>

  <div class="col-sm-9 padding-right">  
          <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
              <div class="view-product">                      
                <img height="" width="" src="<?php echo e(URL::to('media/')); ?>/<?php echo e($product->imagepath); ?>" alt="">
                <!--h3>ZOOM</h3-->
              </div>
            </div>
            <div class="col-sm-7">
              <div class="product-information"><!--/product-information-->
                <img src="<?php echo e(URL::to('images/new.jpg')); ?>" class="newarrival" alt="" />
                <h2><?php echo e($product->title); ?></h2>
                <p>Web ID: 1089772</p>
                <img src="<?php echo e(URL::to('images/rating.png')); ?>" alt="" />
                <span>
                  <span>$<?php echo e($product->price); ?></span>
                  <a href="<?php echo e(route('product.addToCart', ['id' => $product->id])); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> $<?php echo e($product->price); ?></p>
                <a href=""><img src="<?php echo e(URL::to('images/share.png')); ?>" class="share img-responsive"  alt="" /></a>
              </div><!--/product-information-->
            </div>
          </div><!--/product-details-->
  </div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>