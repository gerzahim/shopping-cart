

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Category </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="<?php echo e(route('categories.update', ['id' => $category['id']])); ?>" method="post" id="edit-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Name Category</label>
                <input type="text" id="name" class="form-control" name="name" value="<?php echo e($category['name']); ?>" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="address">Description</label>
                <input type="text" id="description" class="form-control" name="description" value="<?php echo e($category['description']); ?>">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name">Image Category Current</label>
                
                <?php if($category['imagepath'] == ''): ?>
                  <img height="50px" width="50px" src="<?php echo e(URL::to('/')); ?>/images/no-image.jpg" alt="No Images">
                <?php else: ?>
                  <img height="50px" width="50px" src="<?php echo e(URL::to('/')); ?>/media/<?php echo e($category['imagepath']); ?>" alt="No Images">
                <?php endif; ?>
                <br><br>
                <label><input type="checkbox" id="cbox1" name="cbox1" value="1"></label>
                <label for="card-name">Check If Want To Change Current Image Category</label>
                <input type="file" id="imagepath" name="imagepath" accept="image/*">
              </div>              
            </div>            
          </div>    
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-number">Parent Category</label>
                  <select id="parent_id" name="parent_id">
                      <option value="0">No Parent</option>
                    <?php foreach($categories as $categoryy): ?>                      
                      <?php /* <!-- Don't Show itself category --> */ ?>
                      <?php if(!($category['id'] == $categoryy['id'])): ?>
                        <?php /* <!-- Mark Select if it's the same one --> */ ?>
                        <?php if($category['parent_id'] == $categoryy['id']): ?>
                          <option selected="selected" value="<?php echo e($categoryy['id']); ?>"><?php echo e($categoryy['name']); ?></option>
                        <?php else: ?>
                          <option value="<?php echo e($categoryy['id']); ?>"><?php echo e($categoryy['name']); ?></option>
                        <?php endif; ?>

                      <?php endif; ?>  

                    <?php endforeach; ?>
                  </select>                
              </div>              
            </div>            
          </div> 
 
          <?php echo e(method_field('PUT')); ?>

          <?php echo e(csrf_field()); ?>          
          <button type="submit" class="btn btn-success">Update Category</button>
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