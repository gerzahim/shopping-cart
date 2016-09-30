

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Banner </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->

  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="<?php echo e(route('banners.update', ['id' => $banner['id']])); ?>" method="post" id="edit-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Text Red</label>
                <input type="text" id="name" class="form-control" name="text_red" value="<?php echo e($banner['text_red']); ?>" >
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Tex Gray</label>
                <input type="text" id="name" class="form-control" name="text_gray" value="<?php echo e($banner['text_gray']); ?>" >
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Title</label>
                <input type="text" id="name" class="form-control" name="title" value="<?php echo e($banner['title']); ?>" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Description</label>
                <textarea id="description" class="form-control" name="description" rows="3" cols="50" required><?php echo e($banner['description']); ?></textarea>
              </div>              
            </div>            
          </div> 
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Button</label>
                <input type="text" id="name" class="form-control" name="button" value="<?php echo e($banner['button']); ?>" required>
              </div>              
            </div>            
          </div>                     
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name">Image Banner Current</label>                
                  <?php if($banner['imagepath'] == ''): ?>
                    <img height="50px" width="50px" src="<?php echo e(URL::to('/')); ?>/images/no-image.jpg" alt="No Images">
                  <?php else: ?>
                    <img height="50px" width="50px" src="<?php echo e(URL::to('/')); ?>/media/<?php echo e($banner['imagepath']); ?>" alt="No Images">
                  <?php endif; ?>
                <br><br>
                <label><input type="checkbox" id="cbox1" name="cbox1" value="1"></label>
                <label for="card-name">Check If Want To Change Current Image Banner</label>
                <input type="file" id="imagepath" name="imagepath" accept="image/*">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name">Image Price Current</label>                
                  <?php if($banner['imagepath_price'] == ''): ?>
                    <img height="50px" width="50px" src="<?php echo e(URL::to('/')); ?>/images/no-image.jpg" alt="No Images">
                  <?php else: ?>
                    <img height="50px" width="50px" src="<?php echo e(URL::to('/')); ?>/media/<?php echo e($banner['imagepath_price']); ?>" alt="No Images">
                  <?php endif; ?>
                <br><br>
                <label><input type="checkbox" id="cbox2" name="cbox2" value="1"></label>
                <label for="card-name">If Want To Change Current Image Banner</label>
                <input type="file" id="imagepath_price" name="imagepath_price" accept="image/*">
              </div>              
            </div>            
          </div>                
          <?php echo e(method_field('PUT')); ?>

          <?php echo e(csrf_field()); ?>          
          <button type="submit" class="btn btn-success">Update Banner</button>
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