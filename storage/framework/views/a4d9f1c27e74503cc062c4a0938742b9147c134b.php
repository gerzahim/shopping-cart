

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Create a New Categories </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="<?php echo e(route('categories.store')); ?>" method="post" id="create-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Name Category</label>
                <input type="text" id="name" class="form-control" required name="name">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="address">Description</label>
                <input type="text" id="description" class="form-control" name="description">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name">Image Category</label>
                <input type="file" id="imagepath" name="imagepath" accept="image/*">
              </div>              
            </div>            
          </div>    
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-number">Parent Category</label>
                  <select id="parent_id" name="parent_id">
                      <option value="NULL">No Parent</option>
                    <?php foreach($categories as $category): ?>
                      <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                    <?php endforeach; ?>
                  </select>                
              </div>              
            </div>            
          </div> 
 
          <?php echo e(csrf_field()); ?>

          <button type="submit" class="btn btn-success">Create New Category</button>
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