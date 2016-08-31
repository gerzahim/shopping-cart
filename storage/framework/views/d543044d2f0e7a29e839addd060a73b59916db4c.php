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
                      <a href="<?php echo e(route('product.addToCart', ['id' => $product->id])); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <?php /* 
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h2>$<?php echo e($product->price); ?></h2>
                        <p><?php echo e($product->title); ?></p>
                        <a href="<?php echo e(route('product.addToCart', ['id' => $product->id])); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                    </div>
                    */ ?>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="<?php echo e(route('product.seeDetails', ['id' => $product->id])); ?>"><i class="fa fa-eye"></i>See Details</a></li>
                    </ul>
                </div>
              </div>
            </div>      

        <?php endforeach; ?>
    </div>
  </div>    

            


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>