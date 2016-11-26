

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Attribute </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="<?php echo e(route('attributes.update', ['id' => $attribute['id']])); ?>" method="post" id="create-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Name Attribute</label>
                <input type="text" id="name" class="form-control" name="name" value="<?php echo e($attribute['name']); ?>" required>
              </div>              
            </div>                      
          </div>
          <?php echo e(method_field('PUT')); ?>

          <?php echo e(csrf_field()); ?>          
          <button type="submit" class="btn btn-success">Update Attribute</button>

        </form>
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->      

<div class="row">
    <div class="col-md-12">
     <h2>List Values  </h2>   
    </div>
</div>
  <section id="cart_items">
    <div class="container">
      <div class="table-responsive cart_info">
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Value ID</td>
              <td class="description">Name</td>
              <td class="total">Delete</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach( $attributesvalues as $attributesvalue): ?>
              <tr>
                <td align="center"><?php echo e($attributesvalue->id); ?></td>
                <td align="left"><b><?php echo e($attributesvalue->att_value); ?></b></td>
                <td class="cart_delete">
                  <a class="cart_quantity_delete" href="<?php echo e(URL::route('attributesvalue.destroy', [$attribute['id'],$attributesvalue['id']])); ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                </td>              
              </tr>               
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="price"></td>
              <td class="quantity">
                <a class="btn btn-success" href="<?php echo e(URL::route('attributesvalue.create', $attribute['id'])); ?>">Create New Value </a>
                &nbsp;
                <a class="btn btn-warning" href="<?php echo e(URL::route('attributes.index', $attribute['id'])); ?>"> Back </a>
              </td>
              <td class="total"></td>
              <td class="total"></td>
            </tr>            
          </tfoot>
        </table>
      </div>
    </div>
  </section> <!--/#cart_items-->   

</div>
<!-- /. PAGE INNER  -->





</div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>