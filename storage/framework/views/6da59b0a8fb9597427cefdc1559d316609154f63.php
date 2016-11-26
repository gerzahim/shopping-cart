

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Attribute: </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="<?php echo e(route('associateproduct.store', ['id' => $id])); ?>" method="post" id="create-form" enctype="multipart/form-data">
        <input type="hidden" id="associates_attributes_id" name="associates_attributes_id" value="<?php echo e($id); ?>">
            <div class="form-group">
              <label for="card-number">List Product with Attributes: </label>
                <select id="product_attributes_values_id" name="product_attributes_values_id">

                  <?php foreach($assoproducts as $assoproduct): ?>
                      <option value="<?php echo e($assoproduct['id']); ?>">

                      <?php echo e(substr($titleproduct[$assoproduct['product_id']], 0, 15)); ?> / 
                      <?php echo e($skuproduct[$assoproduct['product_id']]); ?> /
                      <?php echo e($listattributesv[$assoproduct['attributes_values_id']]); ?></option>
                  <?php endforeach; ?>
                </select>                
            </div> 
          </div>
          <?php echo e(csrf_field()); ?>

          <button type="submit" class="btn btn-success">Associate this Products</button>
          &nbsp;
          <a class="btn btn-warning" href="<?php echo e(URL::route('associates.edit', $id)); ?>"> Back </a>
        </form>
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>