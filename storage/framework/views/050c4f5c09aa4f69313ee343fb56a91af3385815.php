<?php $__env->startSection('head'); ?>
<link href="<?php echo e(URL::to('engine_gallery/style.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

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
              <div class="view-producta">                      
                <?php /* 
                <img height="" width="" src="<?php echo e(URL::to('media/')); ?>/<?php echo e($product->imagepath); ?>" alt="">
                
                <?php if( file_exists(URL::to('/media/')).$product->imagepath): ?>
                  <img height="" width="" src="<?php echo e(URL::to('media/')); ?>/<?php echo e($product->imagepath); ?>" alt=""> 
                <?php else: ?>
                  <img height="300px" width="300px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" />
                <?php endif; ?>                 
                <!--h3>ZOOM</h3-->

                */ ?>
                <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
                  <div id="wowslider-container1">
                    <div class="ws_images">
                      <ul>
                        <li>
                          <?php if( file_exists(URL::to('/media/')).$product->imagepath): ?>
                            <a target="_blank" href="<?php echo e(URL::to('media/')); ?>/<?php echo e($product->imagepath); ?>">
                              <img height="300px" width="300px" src="<?php echo e(URL::to('media/')); ?>/<?php echo e($product->imagepath); ?>" alt="" title="" id="wows1_0"/>
                            </a>          
                          <?php else: ?>
                            <img height="300px" width="300px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" title="" id="wows1_0"/> 
                          <?php endif; ?>  
                        </li>
                        <?php foreach($imgproducts as $imgproduct): ?>
                            <li>
                              <a target="_blank" href="<?php echo e(URL::to('media/')); ?>/<?php echo e($imgproduct->imagepath1); ?>">
                                <img height="300px" width="300px" src="<?php echo e(URL::to('media/')); ?>/<?php echo e($imgproduct->imagepath1); ?>" alt="" title="" id="wows1_1"/>
                              </a>
                            </li>
                        <?php endforeach; ?>
                        <!--
                        <li><img width="300px" height="300px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" title="" id="wows1_1"/></li>
                        <li><img width="300px" height="300px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" title="" id="wows1_2"/></li>
                        <li><img width="300px" height="300px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" title="" id="wows1_3"/></li>
                        <li><a href="http://wowslider.com/vi"><img width="300px" height="300px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="bootstrap carousel" title="" id="wows1_4"/></a></li>
                        <li><img width="300px" height="300px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" title="" id="wows1_5"/></li>
                        -->
                      </ul>
                    </div>
                    <div class="ws_thumbs">
                      <div>
                          <?php if( file_exists(URL::to('/media/')).$product->imagepath): ?>
                            <a href="#wows1_0" title=""><img width="48px" height="48px" src="<?php echo e(URL::to('media/')); ?>/<?php echo e($product->imagepath); ?>" alt="" /></a> 
                          <?php else: ?>
                            <a href="#wows1_0" title=""><img width="48px" height="48px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" /></a>
                          <?php endif; ?>

                          <?php foreach($imgproducts as $imgproduct): ?>
                              <a href="#wows1_0" title="">
                                <img height="48px" width="48px" src="<?php echo e(URL::to('media/')); ?>/<?php echo e($imgproduct->imagepath1); ?>" alt="" />
                              </a>
                          <?php endforeach; ?>                                                 
                        <!-- 
                        <a href="#wows1_0" title=""><img width="48px" height="48px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" /></a>
                        <a href="#wows1_1" title=""><img width="48px" height="48px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" /></a>
                        <a href="#wows1_2" title=""><img width="48px" height="48px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" /></a>
                        <a href="#wows1_3" title=""><img width="48px" height="48px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" /></a>
                        <a href="#wows1_4" title=""><img width="48px" height="48px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" /></a>
                        <a href="#wows1_5" title=""><img width="48px" height="48px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" /></a>
                        -->
                      </div>
                    </div>
                    <div class="ws_shadow"></div>
                  </div>
                  <!-- End WOWSlider.com BODY section -->
              </div>
            </div>
            <div class="col-sm-7">
              <div class="product-information"><!--/product-information-->
                <img src="<?php echo e(URL::to('images/new.jpg')); ?>" class="newarrival" alt="" />
                <h2><?php echo e($product->title); ?></h2>
                <p><b>Sku:</b> <?php echo e($product->sku); ?></p>
                <!-- 
                <img src="<?php echo e(URL::to('images/rating.png')); ?>" alt="" />
                -->
                <span>
                          <?php if( $setting->loginshowprices == 0): ?>
                            <span>$<?php echo e($product->price); ?></span>
                          <?php else: ?>
                            <?php if(Auth::guest()): ?>
                              <span>Login for Price</span>
                            <?php else: ?>
                              <span>$<?php echo e($product->price); ?></span>
                            <?php endif; ?>                            
                          <?php endif; ?>
                          <br>                
                  <a href="<?php echo e(route('product.addToCart', ['id' => $product->id])); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Description:</b> <?php echo e($product->description); ?></p>
                    <?php foreach($attributesproducts as $attributesproduct): ?>
                    <p><b>
                    <?php echo e($attributeName[$attributeId[$attributesproduct->attributes_values_id]]); ?>: 
                    </b>
                      <?php echo e($attributeValueName[$attributesproduct->attributes_values_id]); ?>

                    </p>
                    <?php endforeach; ?> 
                    <br>
                    <?php foreach($listassociates as $listassociate): ?>
                    <p>Compare by:<b>
                    <?php echo e($listassociate['name']); ?>: 
                    </b><br> 
                     <?php foreach($listassociate['ids'] as $listassociat): ?>
                      <a target="_blank" href="<?php echo e(URL::to('/see-details/')); ?>/<?php echo e($listassociat->id); ?>" title="<?php echo e($listassociat->sku); ?>">
                        <img height="70px" width="70px" src="<?php echo e(URL::to('media/')); ?>/<?php echo e($listassociat->imagepath); ?>" alt="" />
                      </a>                      
                     <?php endforeach; ?>  
                    </p>
                    <br>
                    <?php endforeach; ?>                
                <!-- 
                <a href=""><img src="<?php echo e(URL::to('images/share.png')); ?>" class="share img-responsive"  alt="" /></a>
                -->
              </div><!--/product-information-->
            </div>
          </div><!--/product-details-->
  </div>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script src="<?php echo e(URL::to('engine_gallery/wowslider.js')); ?>"></script>
  <script src="<?php echo e(URL::to('engine_gallery/script.js')); ?>"></script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>