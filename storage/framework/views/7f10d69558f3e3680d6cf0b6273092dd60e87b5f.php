

<?php $__env->startSection('content'); ?>

<div id="page-wrapper" > 
            <div id="page-inner">
                  <?php if(Session::has('message')): ?>
                      <div class="alert alert-success">
                          <?php echo e(Session::get('message')); ?>

                      </div>
                  <?php endif; ?>

                 <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">  
                  <div class="flash-message">
                    <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
                      <?php if(Session::has('alert-' . $msg)): ?>
                      <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>  
                  </div>


                                                
                <div class="row">
                    <div class="col-md-12">
                     <h2>Attribute by Id Product: <?php echo e($id); ?></h2>   
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
              <td class="image">Attribute</td>
              <td class="image">Value</td>
              <td class="quantity">Delete</td>
            </tr>
          </thead>
          <tbody>
          <?php /* DD($attributesproducts) */ ?>

          <?php foreach($attributesproducts as $attributesproduct): ?>
            <tr class="cart_menu">
              <td class="cart_product">
                  <?php echo e($attributeName[$attributeId[$attributesproduct->attributes_values_id]]); ?>

              </td>            
              <td class="cart_product">
                  <?php echo e($attributeValueName[$attributesproduct->attributes_values_id]); ?>

              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" 
                href="<?php echo e(route('deleteProductAttribute', array('id' => $attributesproduct['id'], 'product_id' => $id))); ?>">
                <i class="fa fa-times" aria-hidden="true"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?> 
   
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="price"></td>
              <td class="price">
                <a class="btn btn-success" href="<?php echo e(route('selecattributeproduct', ['id' => $id])); ?>">Add Attribute</a>
              </td>
              <td class="total">
          <a class="cart_quantity_delete" href="<?php echo e(URL::to('/product/')); ?>/<?php echo e($id); ?>/edit"><button class="btn btn-warning"> Back Product Details</button></a>    
     
              </td>
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