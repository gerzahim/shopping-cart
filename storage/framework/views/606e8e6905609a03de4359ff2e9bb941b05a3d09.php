

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Attribute: <?php echo e($attribute->name); ?> </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="<?php echo e(route('attributesvalue.store', ['id' => $attribute['id']])); ?>" method="post" id="create-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Name Value</label>
                <input type="text" id="att_value" class="form-control" required name="att_value">
              </div>              
            </div>            
          </div>          
          </div>
          <?php echo e(csrf_field()); ?>

          <button type="submit" class="btn btn-success">Create New Value</button>
          &nbsp;
          <a class="btn btn-warning" href="<?php echo e(URL::route('attributes.index', $attribute['id'])); ?>"> Back </a>
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