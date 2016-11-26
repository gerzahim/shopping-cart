

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Select Attribute </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->

  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="<?php echo e(route('addattributeproduct', ['id' => $product_id])); ?>" method="get" id="edit-form" enctype="multipart/form-data">
        <input type="hidden" id="product_id" name="product_id" value="<?php echo e($product_id); ?>">
            <div class="form-group">
              <label for="card-number">Attribute</label>
                <select id="attributes_id" name="attributes_id">
                  <?php foreach($attributes as $attribute): ?>              
                      <option value="<?php echo e($attribute['id']); ?>"><?php echo e($attribute['name']); ?></option>
                  <?php endforeach; ?>
                </select>                
            </div> 

          <hr>                
          <?php echo e(csrf_field()); ?>          
          <button type="submit" class="btn btn-success">Select Attribute</button>
        </form>&nbsp;<a class="cart_quantity_delete" href="<?php echo e(URL::to('/showattributeproduct/')); ?>/<?php echo e($product_id); ?>"><button class="btn btn-warning"> Back </button></a>
          
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>