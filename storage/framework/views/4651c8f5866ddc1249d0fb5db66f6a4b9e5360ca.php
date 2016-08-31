<?php $__env->startSection('content'); ?>

    <div class='row'>
      <div class="col-sm-6 col-md-12 col-md-offset-4 col-sm-offset-3"">
        <h1>Checkout</h1>
        <h4>Your Total: $<?php echo e($total); ?></h4>
        <div id="charge-error" class="alert alert-danger <?php echo e(!Session::has('error') ? 'hidden' : ''); ?>">
          <?php echo e(Session::get('error')); ?>

        </div>
        <form action="<?php echo e(route('checkout')); ?>" method="post" id="checkout-form">
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" required name="name">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" class="form-control" required name="address">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name">Card Holder Name</label>
                <input type="text" id="card-name" class="form-control" required>
              </div>              
            </div>            
          </div>    
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-number">Credit Card Number</label>
                <input type="text" id="card-number" class="form-control" required>
              </div>              
            </div>            
          </div>    
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-expiry-month">Expiration Month</label>
                <input type="text" id="card-expiry-month" class="form-control" required>
              </div>              
            </div>            
          </div>    
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-expiry-year">Expiration Year</label>
                <input type="text" id="card-expiry-year" class="form-control" required>
              </div>              
            </div>            
          </div>     
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-expiry-year">CVC</label>
                <input type="text" id="card-cvc" class="form-control" required>
              </div>              
            </div>            
          </div>  
          <?php echo e(csrf_field()); ?>

          <button type="submit" class="btn btn-success">Place Your Order</button>
        </form>
      </div>
    </div>  

<hr>

  <?php if(Session::has('cart')): ?>
  
  <section id="cart_items">
    <div class="container">

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


    </div>
  </section><!--/#do_action--> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
      <script src="js/checkout.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cleancontent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>