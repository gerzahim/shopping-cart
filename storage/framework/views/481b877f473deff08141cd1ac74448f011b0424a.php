

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Associate </h2>   
                    </div>
                </div> 
      <div class="flash-message">
      <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
        <?php if(Session::has('alert-' . $msg)): ?>
        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>               
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="<?php echo e(route('associates.update', ['id' => $assoattribute['id']])); ?>" method="post" id="create-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Name Attribute</label>
                <input type="text" id="name" class="form-control" name="name" value="<?php echo e($assoattribute['name']); ?>" required>
              </div>              
            </div>                      
          </div>
            <div class="form-group">
              <label for="card-number">Associate by: </label>
                <select id="attributes_id" name="attributes_id">

                  <?php foreach($attributes as $attribute): ?> 
                      <?php if($attribute->id == $assoattribute['attributes_id']): ?>
                        <option selected="selected" value="<?php echo e($attribute['id']); ?>"><?php echo e($attribute['name']); ?></option>
                      <?php else: ?>
                        <option value="<?php echo e($attribute['id']); ?>"><?php echo e($attribute['name']); ?></option>
                      <?php endif; ?>                                   
                  <?php endforeach; ?>

                </select>                
            </div>           
          <?php echo e(method_field('PUT')); ?>

          <?php echo e(csrf_field()); ?>          
          <button type="submit" class="btn btn-success">Update Associate</button>

        </form>
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->      

<div class="row">
    <div class="col-md-12">
     <h2>List Products Associates  </h2>   
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

            <?php foreach( $AssociatesProducts as $AssociatesProduct): ?>



              <tr>
                <td align="center"><?php echo e($AssociatesProduct->id); ?></td>
                <td align="left"><b>
                <?php /* 
                <?php echo e($AssociatesProduct->product_attributes_values_id); ?>*/ ?>
                <?php echo e(substr($titleproduct[$listassoproducts_pid[$AssociatesProduct->product_attributes_values_id]], 0, 15)); ?> / 
                <?php echo e($skuproduct[$listassoproducts_pid[$AssociatesProduct->product_attributes_values_id]]); ?> / <?php echo e($listattributesv[$listassoproducts_aid[$AssociatesProduct->product_attributes_values_id]]); ?>

                </b></td>
                <td class="cart_delete">
                  <a class="cart_quantity_delete" href="<?php echo e(URL::route('associateproduct.destroy', [$AssociatesProduct['id'],$assoattribute['id']])); ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                </td>              
              </tr>               
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="price"></td>
              <td class="quantity">
                <a class="btn btn-success" href="<?php echo e(URL::route('associateproduct.create', $associate_id)); ?>">Add Product </a>
                &nbsp;
                <a class="btn btn-warning" href="<?php echo e(URL::route('associates.index')); ?>"> Back </a>
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