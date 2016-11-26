<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Subscribers </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->

<section id="cart_items">
    <div class="container">
    <br><br>
      <?php if(count($errors)>0): ?>
      <div class="alert alert-danger">
        <?php foreach($errors->all() as $error): ?>
          <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
      
      <?php if(Session::has('message')): ?>
          <div class="alert alert-success">
              <?php echo e(Session::get('message')); ?>

          </div>
      <?php endif; ?>    
        
      <div class="step-one">
        <h2 class="heading"></h2>
      </div>  

          <div class="col-sm-8">
            <div class="contact-form">
            <form action="<?php echo e(route('subscribers.update', ['id' => $subscribers['id']])); ?>" method="post" id="edit-form" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                      <label for="address">Email:</label>
                      <input type="text" id="email" class="form-control" placeholder="<?php echo e($subscribers['email']); ?>" readonly> 
                    </div>

                    <br>
                    <div class="form-group col-md-6">
                    <label for="phone">Status:</label>
                    <select id="status" name="status">
                    <?php if($subscribers['status'] == '0'): ?>)
                      <option selected="selected" value="0">Inactive</option>
                      <option value="1">Active</option>
                    <?php else: ?>
                      <option value="0">Inactive</option>
                      <option selected="selected" value="1">Active</option>
                    <?php endif; ?>
                </select>           
                    </div>                                                           
                    <div class="form-group col-md-6"></div>
                    <div class="form-group col-md-6"></div>       
                  <?php echo e(method_field('PUT')); ?>

                  <?php echo e(csrf_field()); ?>          
                  <button type="submit" class="btn btn-success">Update Info</button>                                                     
                </form>
            </div>
          </div>
    
      
    </div>

  </section> <!--/#cart_items-->          <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>