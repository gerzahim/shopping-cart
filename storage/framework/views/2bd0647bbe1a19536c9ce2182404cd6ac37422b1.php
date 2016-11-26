

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Create a New Associate </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="<?php echo e(route('associates.store')); ?>" method="post" id="create-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Producto/Model </label>
                <input type="text" id="name" class="form-control" required name="name">
              </div>              
            </div>            
          </div>          
          </div>
            <div class="form-group">
              <label for="card-number">Associate by: </label>
                <select id="attributes_id" name="attributes_id">
                  <?php foreach($attributes as $attribute): ?>              
                      <option value="<?php echo e($attribute['id']); ?>"><?php echo e($attribute['name']); ?></option>
                  <?php endforeach; ?>
                </select>                
            </div>           
          <?php echo e(csrf_field()); ?>

          <button type="submit" class="btn btn-success">Create New Associate</button>
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