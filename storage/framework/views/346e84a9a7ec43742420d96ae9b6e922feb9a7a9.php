

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
                     <h2>List Associates Attributes </h2>   
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
              <td class="image">Attribute ID</td>
              <td class="description">Name</td>
              <td class="quantity">Edit</td>
              <td class="total">Delete</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach( $associates as $associate): ?>
              <tr>
                <td align="center"><?php echo e($associate->id); ?></td>
                <td align="left"><b><?php echo e($associate->name); ?> Associate by: <?php echo e($listattributes[$associate->attributes_id]); ?></b></td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?php echo e(URL::to('/associates/')); ?>/<?php echo e($associate['id']); ?>/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
              <td class="cart_delete">
                <a href="javascript:void(0);" onclick="$(this).find('form').submit();" >
                  <form action="<?php echo e(URL::route('associates.destroy', $associate['id'])); ?>" method="post">
                      <input type="hidden" name="_method" value="DELETE">
                      <?php echo e(csrf_field()); ?>

                  </form>
                  <i class="fa fa-times"></i>
                </a>
              </td>
              </tr>               
            <?php endforeach; ?>

          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="price"></td>
              <td class="quantity"><a class="btn btn-success" href="<?php echo e(route('associates.create')); ?>">Create Associate</a></td>
              <td class="total"></td>
              <td class="total"></td>
            </tr>            
          </tfoot>
        </table>

      </div>





    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>