<?php $__env->startSection('sidebar'); ?>
<!-- BEGIN SIDEBAR -->

<div class="left-sidebar">
    <!--category-products-->
    <h2>Categories</h2>
          <?php echo $tree; ?> 

    <?php /*
    <div class="panel-group category-products" id="accordian">                          
    </div>
    */ ?>
    <!--/category-products-->

    <div class="brands_products"><!--brands_products-->
      <h2>Brands</h2>
      <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
          <?php echo $tree1; ?>   
        </ul>
      </div>
    </div><!--/brands_products-->

    <!--/Banner Poster-->
    <div class="shipping text-center"><!--shipping-->
    <?php /* 
      <img height="329px" width="270px" src="<?php echo e(URL::to('media/poster.jpg')); ?>""  />
    */ ?>
    <img  width="300px" src="<?php echo e(URL::to('media/')); ?>/<?php echo e($setting->bansidepath); ?>" alt="" />
    </div><!--/shipping-->
    <!--/Banner Poster-->

</div>
<br>
</div>

        <!-- END sidebar -->    
<?php $__env->stopSection(); ?> 


