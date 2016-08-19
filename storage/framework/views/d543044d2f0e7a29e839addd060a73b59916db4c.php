<?php $__env->startSection('content'); ?>

<div class="col-sm-9 padding-right">       
  <div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
      <?php foreach( $products as $product): ?>
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="media/<?php echo e($product->imagepath); ?>" alt="" />
                    <h2>$<?php echo e($product->price); ?></h2>
                    <p><?php echo e($product->title); ?></p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
                  <div class="product-overlay">
                    <div class="overlay-content">
                      <h2>$<?php echo e($product->price); ?></h2>
                      <p><?php echo e($product->title); ?></p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                  </div>
              </div>
              <div class="choose">
                <ul class="nav nav-pills nav-justified">
                  <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                  <li><a href="#"><i class="fa fa-eye"></i>See Details</a></li>
                </ul>
              </div>
            </div>
          </div>      

      <?php endforeach; ?>
  </div>
</div>    




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.shop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>