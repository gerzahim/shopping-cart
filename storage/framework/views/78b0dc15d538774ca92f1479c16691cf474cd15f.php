

<?php $__env->startSection('content'); ?>

<div id="page-wrapper" >
            <div id="page-inner">
                  <?php if(Session::has('message')): ?>
                      <div class="alert alert-success">
                          <?php echo e(Session::get('message')); ?>

                      </div>
                  <?php endif; ?> 

                <div class="row">
                    <div class="col-md-12">
                     <h2>List Orders </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  

  <section id="cart_items">
  


    <div class="col-md-12">
<hr>
      <div class="table-responsive cart_info">

       


        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Date</td>
              <td class="description">Email</td>
              <td class="price">Order Id</td>
              <td class="price">Status</td>
              <td class="quantity">Edit Tracking</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach($orders as $order): ?>
            <tr>
              <td class="cart_description">
                <h4><?php echo e($order['created_at']); ?></h4>
              </td>
              <td class="cart_description">
                <h4><?php echo e($order['email']); ?></h4>
              </td>
              <td class="cart_price">
                <p><?php echo e($order['id']); ?></p>
              </td>

              <td class="cart_price">
                  <?php if($order['status'] == "0"): ?>
                      <p>Pick Up Order</p>
                  <?php elseif($order['status'] == "1"): ?>
                      <p>Pending to Delivery</p>
                  <?php else: ?>
                      <p>Out to Delivery</p>   
                  <?php endif; ?>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="ordersedit/<?php echo e($order['id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php endforeach; ?> 

          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="description"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="total"></td>
            </tr>            
          </tfoot>
        </table>

      </div>
    <?php echo e($orders->links()); ?>





    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>