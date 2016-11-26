<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Tracking Order </h2>   
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

                  <form action="<?php echo e(route('orderupdate', $order->id)); ?>" id="upd-form-user" class="contact-form row" name="upd-form-user" method="post">
                    <div class="form-group col-md-6">
                      <label for="address">Date Order:</label>
                      <input type="text" id="email" class="form-control" value="<?php echo e($order['created_at']); ?>" readonly> 
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Order Id:</label>
                      <input type="text" id="id" class="form-control" value="<?php echo e($order['id']); ?>" readonly> 
                    </div>                    
                    <div class="form-group col-md-6">
                      <label for="address">Email:</label>
                      <input type="text" id="email" class="form-control" value="<?php echo e($order['email']); ?>" readonly> 
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Name:</label>
                        <input type="text" id="name" class="form-control" name="name" value="<?php echo e($order['name']); ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="phone">Telephone:</label>
                    <input type="text" id="phone" class="form-control" name="phone" value="<?php echo e($order['phone']); ?>" readonly>       
                    </div>                    
                    <div class="form-group col-md-12">

                      <label for="address">Detail Order:</label>

                              <div class="panel panel-default">
                                <div class="panel-body">
                                  <ul class="list-group">
                                    <?php foreach($order->cart->items as $item): ?>
                                      <li class="list-group-item">
                                        <span class="badge">$<?php echo e($item['price']); ?></span>
                                        <?php echo e($item['item']['title']); ?> | <strong> Sku: </strong> <?php echo e($item['item']['sku']); ?> | <strong> <?php echo e($item['qty']); ?> </strong> Units 
                                      </li>
                                    <?php endforeach; ?>
                                  </ul>
                                </div>
                                <div class="panel-footer"><strong>Total Price: $<?php echo e($order->cart->totalPrice); ?></strong></div>
                                <div class="panel-footer"><strong>Shipping Price: $<?php echo e($order->cart->shippingCost); ?></strong></div>
                                <div class="panel-footer"><strong>Total Cost: $<?php echo e($order->cart->totalCost); ?></strong></div>
                              </div>

                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Payment Id:</label>
                        <input type="text" id="name" class="form-control" name="name" value="<?php echo e($order['payment_id']); ?>" readonly>
                    </div> 
                    <div class="form-group col-md-6"></div>
                    <div class="form-group col-md-6">
                                        <label for="address">Status Order:</label>  <br>
                      <select id="status" name="status">
                        <?php if($order['status'] == '0'): ?>)
                          <option selected="selected" value="0">Pick Up Order</option>
                          <option value="1">Pending to Delivery</option>
                          <option value="2">Out to Delivery</option>
                        <?php elseif($order['status'] == '1'): ?>)
                          <option value="0">Pick Up Order</option>
                          <option selected="selected" value="1">Pending to Delivery</option>
                          <option value="2">Out to Delivery</option>
                        <?php else: ?>
                          <option value="0">Pick Up Order</option>
                          <option value="1">Pending to Delivery</option>
                          <option selected="selected" value="2">Out to Delivery</option>
                        <?php endif; ?>
                      </select>           
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Shipping Company:</label>
                        <input type="text" id="shipcompany" class="form-control" name="shipcompany" value="<?php echo e($order['shipcompany']); ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Tracking Number:</label>
                        <input type="text" id="tracking" class="form-control" name="tracking" value="<?php echo e($order['tracking']); ?>">
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