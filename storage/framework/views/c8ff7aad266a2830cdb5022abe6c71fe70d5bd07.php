

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
                     <h2>List Users </h2>   
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
              <td class="image">Email</td>
              <td class="price">Status</td>
              <td class="quantity">Edit</td>
              <td class="total">Delete</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach($subscribers as $subscriber): ?>
            <tr>
              <td class="cart_description">
                <h4><a href=""><?php echo e($subscriber['email']); ?></a></h4>
              </td>
              <td class="cart_price">
                  <?php if($subscriber['status'] == "1"): ?>
                      <p>Active</p>
                  <?php else: ?>
                      <p>Inactive</p>   
                  <?php endif; ?>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="subscribers/<?php echo e($subscriber['id']); ?>/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="removeSubscribers/<?php echo e($subscriber['id']); ?>"><i class="fa fa-times"></i></a>
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
              <td class="total"></td>
            </tr>            
          </tfoot>
        </table>

      </div>
    <?php echo e($subscribers->links()); ?>





    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>