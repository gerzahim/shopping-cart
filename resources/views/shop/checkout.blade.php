@extends('layouts.cleancontent')

@section('content')

    <div class='row'>
      <div class="col-sm-6 col-md-12 col-md-offset-4 col-sm-offset-3"">
        <h1>Checkout</h1>
        <h4>Your Total: ${{ $total }}</h4>
        <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
          {{ Session::get('error') }}
        </div>
        <form action="{{ route('checkout') }}" method="post" id="checkout-form">
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
          {{ csrf_field() }}
          <button type="submit" class="btn btn-success">Place Your Order</button>
        </form>
      </div>
    </div>  

<hr>

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
          {{--
          <!-- 
            <tr>
              <td class="cart_product">
                <a href=""><img height="110px" width="110px" src="media/media/{{ $product->imagepath}}" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href="">{{ $product->title}}</a></h4>
                <p>Sku: {{ $product->sku}}</p>
              </td>
              <td class="cart_price">
                <p>${{ $product->price}}</p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <a class="cart_quantity_up" href=""> + </a>
                  <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                  <a class="cart_quantity_down" href=""> - </a>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">$59</p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
              </td>
            </tr>
          -->
          --}}

            <tr>
              <td class="cart_product">
                <a href=""><img height="110px" width="110px" src="images/cart/two.png" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href="">Colorblock Scuba</a></h4>
                <p>Sku: 1089772</p>
              </td>
              <td class="cart_price">
                <p>$59</p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <a class="cart_quantity_up" href=""> + </a>
                  <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                  <a class="cart_quantity_down" href=""> - </a>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">$59</p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
              </td>
            </tr>
            <tr>
              <td class="cart_product">
                <a href=""><img src="images/cart/three.png" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href="">Colorblock Scuba</a></h4>
                <p>Web ID: 1089772</p>
              </td>
              <td class="cart_price">
                <p>$59</p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <a class="cart_quantity_up" href=""> + </a>
                  <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                  <a class="cart_quantity_down" href=""> - </a>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">$59</p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>





    </div>
  </section> <!--/#cart_items-->

  <section id="do_action" >

    <div class="container">


      <div class="row" >


      <!-- 
        <div class="col-sm-6">
          <div class="chose_area">
            <ul class="user_option">
              <li>
                <input type="checkbox">
                <label>Use Coupon Code</label>
              </li>
              <li>
                <input type="checkbox">
                <label>Use Gift Voucher</label>
              </li>
              <li>
                <input type="checkbox">
                <label>Estimate Shipping & Taxes</label>
              </li>
            </ul>
            <ul class="user_info">
              <li class="single_field">
                <label>Country:</label>
                <select>
                  <option>United States</option>
                  <option>Bangladesh</option>
                  <option>UK</option>
                  <option>India</option>
                  <option>Pakistan</option>
                  <option>Ucrane</option>
                  <option>Canada</option>
                  <option>Dubai</option>
                </select>
                
              </li>
              <li class="single_field">
                <label>Region / State:</label>
                <select>
                  <option>Select</option>
                  <option>Dhaka</option>
                  <option>London</option>
                  <option>Dillih</option>
                  <option>Lahore</option>
                  <option>Alaska</option>
                  <option>Canada</option>
                  <option>Dubai</option>
                </select>
              
              </li>
              <li class="single_field zip-field">
                <label>Zip Code:</label>
                <input type="text">
              </li>
            </ul>
            <a class="btn btn-default update" href="">Get Quotes</a>
            <a class="btn btn-default check_out" href="">Continue</a>
          </div>
        </div>
        -->
        <div class="col-sm-6">
        </div>

        <div class="col-sm-6">
          <div class="total_area">
            <ul>
              <li>Cart Sub Total <span>$59</span></li>
              <li>Eco Tax <span>$2</span></li>
              <li>Shipping Cost <span>Free</span></li>
              <li>Total <span>$61</span></li>
            </ul>
              <a class="btn btn-default update" href="">Update</a>
              <a class="btn btn-default check_out" href="">Check Out</a>
          </div>
        </div>
      </div>


    </div>
  </section><!--/#do_action--> 
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
      <script src="js/checkout.js"></script>
@endsection