@extends('layouts.cleancontent')


@section('content')
   <div id="contact-page" class="container">
          <div class="row">       
            <div class="col-sm-12">                 
              <h2 class="title text-center">Checkout </h2>
              <br>                             
            </div>          
          </div>



          <div class="col-sm-8">
            <div class="contact-form">
              <h2 class="title text-center">Your Total: <strong>${{ $total }}</strong></h2>
              <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
                  {{ Session::get('error') }}
              </div>
                <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                    @endif
                  @endforeach
                </div>


              @if ($payment_toorder == '1')
              <form action="{{ route('checkout') }}" id="checkout-form" class="contact-form row" name="checkout-form" method="post">
                    @if (Auth::guest())
                      <div class="form-group col-md-6">
                          <input type="text" id="name" class="form-control" required name="name" placeholder="Full Name">
                      </div>                      
                      <div class="form-group col-md-6">
                          <input type="text" id="email" class="form-control" required name="email" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                          <input type="text" id="phone" class="form-control" required name="phone" placeholder="Phone">
                      </div>
                      <div class="form-group col-md-6"></div>
                      <div class="form-group col-md-12">
                          <input type="text" id="address" class="form-control" required name="address" placeholder="Address">
                      </div>                      
                    @else
                    <div class="form-group col-md-6">
                        <input type="text" id="name" class="form-control" required name="name" value="{{ Auth::user()->name }}" placeholder="Full Name">
                    </div>                    
                      <div class="form-group col-md-6">
                          <input type="text" id="email" class="form-control" required name="email" value="{{ Auth::user()->email }}" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                          <input type="text" id="phone" class="form-control" required name="phone" value="{{ Auth::user()->phone }}" placeholder="Phone">
                      </div>                    
                      <div class="form-group col-md-6"></div>
                      <div class="form-group col-md-12">
                          <input type="text" id="address" class="form-control" required name="address" value="{{ Auth::user()->address }}" placeholder="Address">
                      </div>
                    @endif
                    
                    <div class="form-group col-md-6">
                        <input type="text" id="card-name" class="form-control" placeholder="Card Holder Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" id="card-number" class="form-control" placeholder="Credit Card Number" required>                      
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" id="card-expiry-month" class="form-control" placeholder="Expiration Month" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" id="card-expiry-year" class="form-control" placeholder="Expiration Year" required>                
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" id="card-cvc" class="form-control" placeholder="CVC" required>
                    </div>
                    
                    <div class="form-group col-md-6">
                      <select id="shipping_id" name="shipping_id" required>
                          <option value="0">Please Select Shipping</option>
                          <option value="1">Pick up Store</option>
                          <option value="2">Ground Shipping</option>
                          <option value="3">2nd-Day Shipping</option>
                          <option value="4">Next-Day Shipping</option>
                      </select> 
                    </div>                    
                    <div class="form-group col-md-6">
                        <input type="hidden" id="publishable_key" class="form-control" value="{{ $setting->apipublickey }}">
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success">Place Your Order</button>              
                    </div>  
 
                  {{ csrf_field() }}                                                           
                </form>
                @else
              <form action="{{ route('checkout') }}" id="checkout-form1" class="contact-form row" name="checkout-form1" method="post">
                    @if (Auth::guest())
                      <div class="form-group col-md-6">
                          <input type="text" id="name" class="form-control" required name="name" placeholder="Full Name">
                      </div>                      
                      <div class="form-group col-md-6">
                          <input type="text" id="email" class="form-control" required name="email" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                          <input type="text" id="phone" class="form-control" required name="phone" placeholder="Phone">
                      </div>
                      <div class="form-group col-md-6"></div>
                      <div class="form-group col-md-12">
                          <input type="text" id="address" class="form-control" required name="address" placeholder="Address">
                      </div>                      
                    @else
                    <div class="form-group col-md-6">
                        <input type="text" id="name" class="form-control" required name="name" value="{{ Auth::user()->name }}" placeholder="Full Name">
                    </div>                    
                      <div class="form-group col-md-6">
                          <input type="text" id="email" class="form-control" required name="email" value="{{ Auth::user()->email }}" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                          <input type="text" id="phone" class="form-control" required name="phone" value="{{ Auth::user()->phone }}" placeholder="Phone">
                      </div>                    
                      <div class="form-group col-md-6"></div>
                      <div class="form-group col-md-12">
                          <input type="text" id="address" class="form-control" required name="address" value="{{ Auth::user()->address }}" placeholder="Address">
                      </div>
                    @endif
                    
                    <div class="form-group col-md-6">
                      <select id="shipping_id" name="shipping_id" required>
                          <option value="0">Please Select Shipping</option>
                          <option value="1">Pick up Store</option>
                          <option value="2">Ground Shipping</option>
                          <option value="3">2nd-Day Shipping</option>
                          <option value="4">Next-Day Shipping</option>
                      </select> 
                    </div>                    
                    <div class="form-group col-md-6">
                        <input type="hidden" id="publishable_key" class="form-control" value="{{ $setting->apipublickey }}">
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success">Place Your Order</button>              
                    </div>  
 
                  {{ csrf_field() }}                                                           
                </form>

                @endif



            </div>
          </div>          
   </div>



  @if(Session::has('cart'))


  
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
            @foreach($products as $product)
            <tr>
              <td class="cart_product">
                <a href=""><img height="110px" width="110px" src="media/{{ $product['item']['imagepath']}}" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href="">{{ $product['item']['title'] }}</a></h4>
                <p>Sku: {{ $product['item']['sku'] }}</p>
              </td>
              <td class="cart_price">
                <p>${{ $product['item']['price'] }}</p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <a class="cart_quantity_down" href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}"> - </a>
                  <input class="cart_quantity_input" type="text" name="quantity" value="{{ $product['qty'] }}" autocomplete="off" size="2">
                  <a class="cart_quantity_up" href="{{ route('product.addByOne', ['id' => $product['item']['id']]) }}"> + </a>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">${{ $product['item']['price']*$product['qty'] }}</p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{ route('product.removeItem', ['id' => $product['item']['id']]) }}"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            @endforeach

 

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
              <li>Cart Sub Total <span>${{ $totalPrice }}</span></li>
              <li>Shipping Cost <span id="shippingcost">Please Select Shipping</span></li>
              <li>Total <span id="totalprice">${{ $totalPrice }}</span></li>
            </ul>
          </div>
        </div>
      </div>


    </div>
  </section><!--/#do_action--> 


  @else
    <div class="row">
      <div class="col-sm6 col-md6 col-md-offset-3 col-sm-offset3">
        <strong>No Items in Cart</strong>        
      </div>
    </div>  
  @endif


    </div>
  </section><!--/#do_action--> 
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
      <script src="js/checkout.js"></script>

<script type="text/javascript">
var token = '{{ Session::token() }}';
var url = '{{ route('getshippingcost') }}';
var totalprice = '{{ $totalPrice }}';
</script>

<script type="text/javascript">

$(document).ready(function(){  

    $('#shipping_id').on('change', function() {
      var shipping_id = $('#shipping_id').val()
      //alert( this.value ); // or $(this).val()
      var dataString = "id="+shipping_id;
      //alert(dataString);

      $.ajax({
        method: "POST",
        url: url,
        //data: dataString,
        data: { id: $('#shipping_id').val(), _token: token, _totalprice: totalprice},
        success: function(data) {
         //console.log(data);
         console.log( data.shippingcost );         
         console.log( data.total_cost );
          $('#shippingcost').html('$'+data.shippingcost);
          $('#totalprice').html('$'+data.total_cost);
          //$('#myshipping').append(token);
        }
      });

    });

});
/*
         function getMessage(){
          //alert('Helloo');

$.ajax({
    url: '/getmsg',
    type: 'POST',
    data: {_token: CSRF_TOKEN},
    dataType: 'JSON',
    success: function (data) {
        console.log(data);
    }
});
*/
</script>      
@endsection