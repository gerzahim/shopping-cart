

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
                      <h2>Multiple Update Products </h2>  
                    </div> 
                  </div>
                  
                           
                 <!-- /. ROW  -->
                  

  <section id="cart_items">
  


    <div class="col-md-12">
<hr>
      <div class="table-responsive cart_info">  
      <form action="<?php echo e(route('product.multipleupdate', ['ids' => $ids])); ?>" method="post" id="edit-form" enctype="multipart/form-data">
        <table class="table table-condensed" id="products">
              <thead>
                <tr class="cart_menu">
                  <td class="image">Products</td>
                  <td class="description">Changes</td>
                </tr>
              </thead>
              <tbody>
              <tr class="cart_menu">

                  <td class="image">
                   <?php foreach( $products as $product ): ?>
                             - <?php echo e($product->title); ?> <br>
                      <?php endforeach; ?>                                                                

                  </td>
                  <td class="description">
                    <div class="form-group">
                      <label for="card-number">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <select id="status" name="status">
                        <option value="0">---NO CHANGE---</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                      </select>                
                    </div> 
                    <div class="form-group">
                      <label for="card-number">Categories</label>
                        <select id="categories_id" name="categories_id">
                          <option value="0">---NO CHANGE---</option> 
                          <?php foreach($categories as $category): ?>
                              <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>                     
                          <?php endforeach; ?>
                        </select>                
                    </div>  
                    <div class="form-group">
                      <label for="card-number">Brands &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select id="brand_id" name="brand_id">
                          <option value="0">---NO CHANGE---</option> 
                          <?php foreach($brands as $brand): ?>
                              <option value="<?php echo e($brand['id']); ?>"><?php echo e($brand['name']); ?></option>                     
                          <?php endforeach; ?>
                        </select>                                       
                    </div>
                    <div class="row">
                    <div class="col-xs-4">                   
                    <div class="form-group">
                      <label for="address">Description</label>
                      <textarea id="description" class="form-control" name="description" rows="4" cols="50" placeholder="---NO CHANGE---"></textarea>
                    </div></div></div>
                    <div class="row">
                    <div class="col-xs-4">                   
                    <div class="form-group">
                      <label for="name">Price $</label>
                      <input type="text" id="price" class="form-control" name="price" placeholder="---NO CHANGE---">
                    </div></div></div>
                    <div class="row">
                    <div class="col-xs-4">                   
                    <div class="form-group">
                      <label for="name">Stock #</label>
                      <input type="text" id="quantity" class="form-control" name="quantity" placeholder="---NO CHANGE---">
                    </div> 
                    <?php echo e(csrf_field()); ?>   
                <button type="submit" class="btn btn-success">Update Products</button>                                            
                    </div></div>
                  </td>
                    
                </tr>

              </tbody>

        </table>
      </form>    
      </div>
        
      <br>




    </div>


  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>