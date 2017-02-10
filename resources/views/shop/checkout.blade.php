

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
                  @if ($modal_pay == '0')
                    <form action="{{ route('checkout') }}" id="checkout-form" class="contact-form row" name="checkout-form" method="post">
                  @endif
                @else
                    <form action="{{ route('checkout') }}" id="checkout-form" class="contact-form row" name="checkout-form" method="post">                
                @endif

                
                    <div class="form-group col-md-6">
                          <label for="country">Full Name:</label>
                        <input type="text" id="name" class="form-control" required name="name" value="{{ Auth::guest() ? '' : Auth::user()->name }}" placeholder="Full Name">                          
                    </div>                    
                      <div class="form-group col-md-6">
                          <label for="country">Email:</label>
                          <input type="text" id="email" class="form-control" required name="email" value="{{ Auth::guest() ? '' : Auth::user()->email }}" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                          <label for="country">Phone:</label>
                          <input type="text" id="phone" class="form-control" required name="phone" value="{{ Auth::guest() ? '' : Auth::user()->phone }}" placeholder="Phone">
                      </div>
                      <div class="form-group col-md-6">
                          <label for="country">Company:</label>
                          <input type="text" id="companyname" class="form-control" name="companyname" value="{{ Auth::guest() ? '' : Auth::user()->companyname }}" placeholder="Company Name">
                      </div>                                          
                      <div class="form-group col-md-6"></div>
                      <div class="form-group col-md-12">
                          <label for="country">Address:</label>
                          <input type="text" id="address" class="form-control" required name="address" value="{{ Auth::guest() ? '' : Auth::user()->address }}" placeholder="Address">
                      </div>
                      <div class="form-group col-md-6">
                          <label for="city">City:</label>                    
                          <input type="text" id="city" class="form-control" name="city"  value="{{ Auth::guest() ? '' : Auth::user()->city }}" placeholder="City">                      
                      </div>
                      <div class="form-group col-md-6">
                          <label for="state">State:</label>
                          <select  id="state" name="state" class="form-control" >
                            @if (Auth::guest())                                                                        
                                  @foreach($states as $state)
                                          <option value="{{ $state->code }}">{{ $state->name }}</option>                                                 
                                  @endforeach
                              </select>                       
                            @else
                                  @foreach($states as $state)            
                                      @if( Auth::user()->city == $state->code)
                                            <option value="{{ $state->code }}" selected>{{ $state->name }}</option>                                
                                      @else
                                            <option value="{{ $state->code }}">{{ $state->name }}</option>                                
                                      @endif
                                  @endforeach
                                                     
                            @endif
                          </select>                         
                      </div>
                      <div class="form-group col-md-6">
                      <label for="zip">Zip Code:</label>
                      <input type="text" id="zip" class="form-control" name="zip" value="{{ Auth::guest() ? '' : Auth::user()->zip }}" placeholder="33174">             
                      </div>
                      <div class="form-group col-md-6">
                      <label for="country">Country:</label>
                      <input type="text" id="country" class="form-control" name="country" value="{{ Auth::guest() ? '' : Auth::user()->country }}" placeholder="USA">
                      </div>                       

                    <div class="form-group col-md-12">
                      <label for="country">Please Select Delivery Option:</label>
                      <select id="shipping_id" name="shipping_id" required>
                          <option value="0">Select Shipping...</option>
                          <option value="5">Local Free Delivery</option>
                          <option value="1">Pick up Store</option>
                          <option value="2">Ground Shipping</option>
                          <option value="3">2nd-Day Shipping</option>
                          <option value="4">Next-Day Shipping</option>
                      </select> 
                    </div>   



                    @if ($payment_toorder == '1')

                        @if ($modal_pay == '1')

                          <div class="form-group col-md-12">
                            <button name="redirect" id="redirect" class="btn btn-success">  
                              PAYMENT&nbsp;&nbsp;
                              <i class="fa fa-credit-card" aria-hidden="true"></i>
                              </button>
                          </div>                          

                        @else 

                          <div class="form-group col-md-12">
                            <hr>
                            <label for="country">Payment Info</label>
                          </div>                    
                          <div class="form-group col-md-6"></div><div class="form-group col-md-6"></div>
                          <div class="form-group col-md-6">
                              <label for="country">Card Holder Name:</label>
                              <input type="text" id="card-name" class="form-control" placeholder="Card Holder Name" required>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="country">Credit Card Number:</label>
                              <input type="text" id="card-number" class="form-control" placeholder="Credit Card Number" required>                      
                          </div>
                          <div class="form-group col-md-6">
                              <label for="country">Expiration Month:</label>
                              <input type="text" id="card-expiry-month" class="form-control" placeholder="Expiration Month" required>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="country">Expiration Year:</label>
                              <input type="text" id="card-expiry-year" class="form-control" placeholder="Expiration Year" required>                
                          </div>
                          <div class="form-group col-md-6">
                              <label for="country">CVC:</label>
                              <input type="text" id="card-cvc" class="form-control" placeholder="CVC" required>
                          </div>  
                          <div class="form-group col-md-6">
                              <input type="hidden" id="publishable_key" class="form-control" value="{{ $setting->apipublickey }}">
                          </div> 

                          <div class="form-group col-md-12">
                              <button type="submit" class="btn btn-success">Place Your Order </button>              
                          </div>                      
                        @endif

                    @else
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success">Place Your Order </button>              
                        </div>  
                    @endif
                    


 
                  {{ csrf_field() }}                                                           
                </form>


            </div>
          </div>          
   </div>



  @if(Session::has('cart'))


  
  <section id="cart_items">
    <div class="container">

      <div class="table-responsive cart_info">
        <table class="table table-condensed" border="0">
          <thead>
            <tr class="cart_menu">
              <td class="image">Product</td>
              <td class="description">Item</td>
              <td class="price">Price</td>
              <td class="quantity">Quantity</td>
              <td class="total" align="center">Total</td>
              <td class="total" align="center">Delete</td>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td class="">
                <a href=""><img height="110px" width="110px" src="media/{{ $product['item']['imagepath']}}" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href="">{{ $product['item']['title'] }}</a></h4>
                <p>Sku: {{ $product['item']['sku'] }}</p>
              </td>
              <td class="cart_price">
                <p>${{ $product['item']['price'] }}</p>
              </td>
              <td class="cart_quantity" align="center">
                <div class="cart_quantity_button">
                  <a class="cart_quantity_down" href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}"> - </a>
                  <input class="cart_quantity_input" type="text" name="quantity" value="{{ $product['qty'] }}" autocomplete="off" size="2">
                  <a class="cart_quantity_up" href="{{ route('product.addByOne', ['id' => $product['item']['id']]) }}"> + </a>
                </div>
              </td>
              <td class="cart_price" align="center">
                <p class="cart_total_price">${{ $product['item']['price']*$product['qty'] }}</p>
              </td>
              <td class="cart_price" align="center">
                <a class="cart_quantity_delete" href="{{ route('product.removeItem', ['id' => $product['item']['id']]) }}"><i class="fa fa-times fa-2x"></i></a>
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
              <li>SubTotal : <span>${{ $totalPrice }}</span></li>
              <li>State Tax to be Collected : <span id="taxcost">Please Select State</span></li>
              <li>SubTotal + Tax : <span id="subtotalwtax">${{ $totalPrice }}</span></li>
              <li>Shipping Cost : <span id="shippingcost">Please Select Delivery Option</span></li>
              <li>Grand Total : <span id="totalcost">${{ $totalPrice }}</span></li>

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

@if ($modal_pay == '0')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="js/checkout.js"></script>
@endif


<script type="text/javascript">
var token = '{{ Session::token() }}';
var url = '{{ route('getshippingcost') }}';
var totalprice = '{{ $totalPrice }}';
</script>



<script type="text/javascript">

$(document).ready(function(){  

    $('#shipping_id').on('change', function() {
      var shipping_id = $('#shipping_id').val()
      var state = $('#state').val()
      //alert( state ); // or $(this).val()
      var dataString = "id="+shipping_id;
      //alert(dataString);

      $.ajax({
        method: "POST",
        url: url,
        //data: dataString,
        data: { id: $('#shipping_id').val(),  state: $('#state').val(), _token: token, _totalprice: totalprice},
        success: function(data) {
         console.log(data);
         console.log( data.shippingcost );         
         console.log( data.total_cost );
         console.log( data.subtotalwtax );
         console.log( data.taxcost );
         console.log( data.totalprice );
          $('#shippingcost').html('$ '+data.shippingcost);
          $('#subtotalwtax').html('$ '+data.subtotalwtax);
          $('#taxcost').html('$ '+data.taxcost);
          $('#totalcost').html('$ '+data.totalcost);          
          $('#totalprice').html('$ '+data.totalprice);
          $('#myshipping').append(token);
        }

      });
      //alert(dataString);

      });

    $("#redirect").click(function () {
        //alert("test");
        //name, email, phone, address, city, state, zip, country
        var url = '{{ route('payment') }}'; 

        var nameReg = /^[A-Za-z]+$/;
        var numberReg =  /^[0-9]+$/;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;        

        var shipping_id = document.getElementById("shipping_id");
        var name = document.getElementById("name");
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var companyname = $('#companyname').val();
        var address = $('#address').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var zip = $('#zip').val();
        var country = $('#country').val();
        

        if (name == '') {
            alert('Please write full name !!!');
             $( "#name" ).focus();
        }  else if (email == '') {
            alert('Please write email !!!');
             $( "#email" ).focus();
        }  else if (!emailReg.test(email)){
            alert('Please write valid Email !!!');
             $( "#email" ).focus();
        } else if (phone == '') {
            alert('Please write Phone !!!');
             $( "#phone" ).focus();
        }  else if (!numberReg.test(phone)){
            alert('Please write valid Phone Number !!!');
             $( "#phone" ).focus();
        } else if (address == '') {
            alert('Please write address !!!');
             $( "#address" ).focus();
        } else if (city == '') {
            alert('Please write city !!!');
             $( "#city" ).focus();
        } else if (zip == '') {
            alert('Please write Zip Code !!!');
             $( "#zip" ).focus();
        }  else if (!numberReg.test(zip)){
            alert('Please write valid Zip Code !!!');
             $( "#zip" ).focus();
        } else if (country == '') {
            alert('Please write country !!!');
             $( "#country" ).focus();
        } else if (shipping_id.selectedIndex == 0) {
             alert('Select Method Shipping !!!');
             $( "#shipping_id" ).focus();
        }else {
            var selectedText = shipping_id.options[shipping_id.selectedIndex].text;
            //alert(url);
            //window.location.href = url;
            window.location.href = url+"?name="+name+"&email="+email+"&phone="+phone+"&companyname="+companyname+"&address="+address+"&city="+city+"&state="+state+"&zip="+zip+"&shipping_id="+shipping_id.selectedIndex; 


        }         
    });

});

</script>    




@endsection