<?php $__env->startSection('content'); ?>

  <?php if(Session::has('cart')): ?>

<?php /* 

<!--

    <div class='row'>
      <div class="container">
        <ul class="list-group">
          <?php foreach($products as $product): ?>
            <li class="list-group-item">
              <span class="badge"><?php echo e($product['qty']); ?></span>              
              <strong><?php echo e($product['item']['title']); ?></strong>
              <span class="label label-success"><?php echo e($product['price']); ?></span>
              <div class="btn-group">
                <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo e(route('product.reduceByOne', ['id' => $product['item']['id']])); ?>">Reduce By 1</a></li> 
                    <li><a href="<?php echo e(route('product.removeItem', ['id' => $product['item']['id']])); ?>">Reduce All</a></li>
                  </ul>
              </div>
            </li>
          <?php endforeach; ?>  
        </ul>        
      </div>
    </div>

    <div class="row">
      <div class="col-sm6 col-md6 col-md-offset-3 col-sm-offset3">
        <strong>Total: $<?php echo e($totalPrice); ?></strong>        
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm6 col-md6 col-md-offset-3 col-sm-offset3">
        <a href="<?php echo e(route('checkout')); ?>" class="btn btn-success">Checkout</a>
      </div>
    </div>    
-->
*/ ?>

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
              <td></td>
            </tr>
          </thead>
          <tbody>
            <?php foreach($products as $product): ?>
            <tr>
              <td class="cart_product">
                <a href=""><img height="110px" width="110px" src="media/<?php echo e($product['item']['imagepath']); ?>" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href=""><?php echo e($product['item']['title']); ?></a></h4>
                <p>Sku: <?php echo e($product['item']['sku']); ?></p>
              </td>
              <td class="cart_price">
                <p>$<?php echo e($product['item']['price']); ?></p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <a class="cart_quantity_down" href="<?php echo e(route('product.reduceByOne', ['id' => $product['item']['id']])); ?>"> - </a>
                  <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo e($product['qty']); ?>" autocomplete="off" size="2">
                  <a class="cart_quantity_up" href="<?php echo e(route('product.addByOne', ['id' => $product['item']['id']])); ?>"> + </a>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">$<?php echo e($product['item']['price']*$product['qty']); ?></p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?php echo e(route('product.removeItem', ['id' => $product['item']['id']])); ?>"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>

 

          </tbody>
        </table>
      </div>





    </div>
  </section> <!--/#cart_items-->

  <section id="do_action" >

        <div class="container">
          <div class="row" >
          <div class="col-sm-6">
        </div>

        <div class="col-sm-6">
          <div class="total_area">
            <ul>
              <li>Cart Sub Total <span>$<?php echo e($totalPrice); ?></span></li>
              <li>Shipping Cost <span>Free</span></li>
              <li>Total <span>$<?php echo e($totalPrice); ?></span></li>
            </ul>
              <a class="btn btn-default check_out" href="<?php echo e(route('checkout')); ?>">Check Out</a>
          </div>
        </div>
      </div>


    </div>
  </section><!--/#do_action--> 


  <?php else: ?>
    <div class="row">
      <div class="col-sm6 col-md6 col-md-offset-3 col-sm-offset3">
        <strong>No Items in Cart</strong>        
      </div>
    </div>  
  <?php endif; ?>




            


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cleancontent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>