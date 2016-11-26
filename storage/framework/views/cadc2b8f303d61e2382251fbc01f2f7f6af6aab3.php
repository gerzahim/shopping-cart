

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
                     <h2>Gallery Images by Id Product: <?php echo e($id); ?></h2>   
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
              <td class="image">Image</td>
              <td class="quantity">Edit</td>
              <td class="quantity">Delete</td>
            </tr>
          </thead>
          <tbody>
          <?php foreach($imgproducts as $imgproduct): ?>
            <tr class="cart_menu">
              <td class="cart_product">
                <?php if( file_exists(URL::to('/media/')).$imgproduct->imagepath1): ?>
                  <img height="50px" width="50px" src="<?php echo e(URL::to('media/')); ?>/<?php echo e($imgproduct->imagepath1); ?>" alt=""> 
                <?php else: ?>
                  <img height="50px" width="50px" src="<?php echo e(URL::to('/images/')); ?>/no-image.jpg" alt="" />
                <?php endif; ?>  
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?php echo e(URL::to('/imagesedit/')); ?>/<?php echo e($imgproduct['id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?php echo e(URL::to('/imagesdelete/')); ?>/<?php echo e($imgproduct['id']); ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php endforeach; ?> 
   
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="price"></td>
              <td class="price">
                <a class="btn btn-success" href="<?php echo e(route('addimagegallery', ['id' => $id])); ?>">Add Image Gallery</a>
              </td>
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