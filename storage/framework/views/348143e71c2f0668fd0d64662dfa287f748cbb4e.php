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
        <h2 class="heading">User Account</h2>
      </div>  

          <div class="col-sm-8">
            <div class="contact-form">

              <form action="<?php echo e(route('userupdate', $user->id)); ?>" id="upd-form-user" class="contact-form row" name="upd-form-user" method="post">
                    <div class="form-group col-md-6">
                      <label for="address">Email:</label>
                      <input type="text" id="email" class="form-control" placeholder="<?php echo e($user['email']); ?>" readonly> 
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Name:</label>
                    <?php if($user['name'] != ''): ?>
                      <input type="text" id="name" class="form-control" name="name" placeholder="<?php echo e($user['name']); ?>">
                    <?php else: ?>
                      <input type="text" id="name" class="form-control" name="name" placeholder="Full Name">
                    <?php endif; ?>
                        
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Password:</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password : Leave Blank if Don't Want to Change">
                    </div><br>
          <div class="bill-to col-md-12">
            <p>Bill To</p>
          </div>
                    <div class="form-group col-md-6">
                      <label for="address">Address:</label>
                        <input type="text" id="address" class="form-control" name="address" placeholder="<?php echo e($user['address']); ?>"">
                    </div>
                    <div class="form-group col-md-6">
            <label for="city">City:</label>                    
                        <input type="text" id="city" class="form-control" name="city" placeholder="<?php echo e($user['city']); ?>">                      
                    </div>
                    <div class="form-group col-md-6">
                        <label for="state">State:</label>
                    <input type="text" id="state" class="form-control" name="state" placeholder="<?php echo e($user['state']); ?>">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="zip">Zip Code:</label>
                    <input type="text" id="zip" class="form-control" name="zip" placeholder="<?php echo e($user['zip']); ?>">             
                    </div>
                    <div class="form-group col-md-6">
                    <label for="country">Country:</label>
                    <input type="text" id="country" class="form-control" name="country" placeholder="<?php echo e($user['country']); ?>">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="phone">Telephone:</label>
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="<?php echo e($user['phone']); ?>">       
                    </div>
                    <div class="form-group col-md-6">
                    <label for="phone">Status:</label>
                    <select id="status" name="status">
                    <?php if($user['status'] == '0'): ?>)
                      <option selected="selected" value="0">Inactive</option>
                      <option value="1">Active</option>
                    <?php else: ?>
                      <option value="0">Inactive</option>
                      <option selected="selected" value="1">Active</option>
                    <?php endif; ?>
                    </select>           
                    </div>  
                    <div class="form-group col-md-6">
                    <label for="phone">Role:</label>
                    <select id="role" name="role">
                    <?php if($user['role'] == '1'): ?>)
                      <option selected="selected" value="1">Costumer</option>
                      <option value="2">Administrator</option>
                    <?php else: ?>
                      <option value="1">Costumer</option>
                      <option selected="selected" value="2">Administrator</option>
                    <?php endif; ?>
                    </select>           
                    </div>                                                                             
                    <div class="form-group col-md-6"></div>
                    <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-success">Update Info</button>       
                    </div>       
                  <?php echo e(csrf_field()); ?>                                                           
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