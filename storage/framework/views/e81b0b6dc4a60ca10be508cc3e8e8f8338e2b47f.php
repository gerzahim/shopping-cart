<?php $__env->startSection('content'); ?>

  <?php if(!empty($products)): ?>
  

  <div class="row">
      <div class="col-md-12">
       <h2>Wish List </h2>   
      </div>
  </div> 


      <section id="cart_items">
    <div class="container">
<hr>
      <div class="table-responsive cart_info">
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Item</td>
              <td class="description"></td>
              <td class="price">Price</td>
              <td class="quantity">Quantity</td>
              <td class="total">Total</td>
              <td align="center">Delete</td>
              <td align="center">Move to Cart</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach($products as $product): ?>
            <tr>
              <td class="cart_product">
                <a href=""><img height="110px" width="110px" src="media/<?php echo e($product['imagepath']); ?>" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href=""><?php echo e($product['title']); ?></a></h4>
                <p>Sku: <?php echo e($product['sku']); ?></p>
              </td>
              <td class="cart_price">
                <p>$<?php echo e($product['price']); ?></p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <a class="cart_quantity_down" href="<?php echo e(route('wishlist.reduceByOne', ['id' => $product['id']])); ?>"> - </a>
                  <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo e($quantity[$product['id']]['qty']); ?>" autocomplete="off" size="2">
                  <a class="cart_quantity_up" href="<?php echo e(route('wishlist.addByOne', ['id' => $product['id']])); ?>"> + </a>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">$<?php echo e($product['price']*$quantity[$product['id']]['qty']); ?></p>
              </td>
              <td class="cart_delete" align="center">
                <a class="cart_quantity_delete" href="<?php echo e(route('wishlist.removeItem', ['id' => $product['id']])); ?>"><i class="fa fa-times"></i></a>
              </td>
              <td class="cart_total" align="center">
                <a class="cart_quantity_delete" href="<?php echo e(route('wishlist.MovetoCart', ['id' => $product['id']])); ?>"><i class="fa fa-shopping-cart fa-2x"></i></a>
              </td>              
            </tr>
            <?php endforeach; ?>

 

          </tbody>
        </table>
      </div>





    </div>
  </section> <!--/#cart_items-->



  <?php else: ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <strong><h1>No Items in WishList</h1></strong>        
      </div>
    </div> 
</div> 
  <?php endif; ?>




            


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cleancontent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>