

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>List Products </h2>   
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
              <td class="image">Imagen</td>
              <td class="description">Name</td>
              <td class="quantity">Sku</td>
              <td class="quantity">Price</td>
              <td class="quantity">Stock</td>
              <td class="quantity">Brand</td>
              <td class="quantity">Category</td>            
              <td class="quantity">Edit</td>
              <td class="total">Delete</td>
            </tr>
          </thead>
          <tbody>
         <?php echo $tree; ?>      
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="price"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="price"></td>                            
              <td class="quantity"><a class="btn btn-success" href="<?php echo e(route('product.create')); ?>">Create New Product</a></td>
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