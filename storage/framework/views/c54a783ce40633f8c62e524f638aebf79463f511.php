<?php $__env->startSection('banner'); ?>

<!-- BEGIN BANNER -->
  <section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
              <li data-target="#slider-carousel" data-slide-to="1"></li>
              <li data-target="#slider-carousel" data-slide-to="2"></li>
            </ol>
            
            <div class="carousel-inner">
              <?php foreach( $banners as $banner): ?>
                  <?php if($banner->typeofbanner == '0'): ?>
                    <div class="item <?php echo e($banner->active); ?>">
                      <div class="col-sm-6">
                        <h1><span><?php echo e($banner->text_red); ?></span><?php echo e($banner->text_gray); ?></h1>
                        <h2><?php echo e($banner->title); ?></h2>
                        <p><?php echo e($banner->description); ?></p>
                        <a href="<?php echo e($banner->link); ?>"><button type="button" class="btn btn-default get"><?php echo e($banner->button); ?></button></a>
                      </div>
                      <div class="col-sm-6">
                        <img height="280px" width="280px"  src="media/<?php echo e($banner->imagepath); ?>" class="girl img-responsive" alt="" />
                        <?php if(!$banner->imagepath_price == ''): ?>
                          <img src="media/<?php echo e($banner->imagepath_price); ?>"  class="pricing" alt="" />
                        <?php endif; ?>  
                      </div>
                    </div> 
                  <?php else: ?>
                    <div class="item <?php echo e($banner->active); ?>">
                      <div class="col-sm-12" >
                        <a href="<?php echo e($banner->link); ?>">
                          <img src="media/<?php echo e($banner->imagepath); ?>" alt="" />
                        </a>
                      </div>
                    </div>                
                  <?php endif; ?>


              <?php endforeach; ?>
           
            </div>                        
            
            
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
          
        </div>
      </div>
    </div>
  </section><!--/slider-->
<!-- END BANNER -->
<?php $__env->stopSection(); ?>