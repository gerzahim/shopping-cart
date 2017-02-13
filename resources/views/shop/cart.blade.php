@extends('layouts.cleancontent')

@section('content')

  @if(Session::has('cart'))

                <div class="row">
                    <div class="col-md-12">
                     <h2>Cart List</h2>   
                    </div>
                      
                </div> 
  <section id="cart_items">
   <div class="container">
       <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif
      @endforeach
    </div>
   </div>

    <div class="container">
<hr>
      <div class="table-responsive cart_info">
        <table class="table table-condensed" border="0">
          <thead>
            <tr class="cart_menu">
              <td class="image" width="10%">Product</td>
              <td class="description" width="50%">Item</td>
              <td class="price" width="10%">Price</td>
              <td class="quantity" width="5%">Quantity</td>
              <td class="total" width="10%">Total</td>
              <td class="description" width="5%">Delete</td>
              <td class="description" align="center" width="10%">Move to WishList</td>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td class="">
                <a href="">
                {{--
                <img height="110px" width="110px" src="media/{{ $product['item']['imagepath']}}" alt="">
                --}}
                <img id="currentPhoto" height="110px" width="110px" src="media/{{ $product['item']['imagepath']}}" onerror="this.src='{{ URL::to('/images/') }}/no-image.jpg'" width="110px" height="110px">                

                </a>
              </td>
              <td class="cart_description">
                <h4><a href="">{{ $product['item']['title'] }}</a></h4>
                <p>Sku: {{ $product['item']['sku'] }}</p>
              </td>
              <td class="cart_price">
                <p>${{ $product['item']['price'] }}</p>
              </td>
              <td class="cart_quantity" >
                <div class="cart_quantity_button">
                  <select name="quantity" id="quantity">
                    @for ($i = 1; $i <= 30; $i++)
                      @if( $i <= $product['item']['quantity'] )
                        @if( $i == $product['qty'] )
                        <option selected value="{{ $product['item']['id'] }}-{{ $i }}">{{ $i }}</option>
                        @else
                        <option value="{{ $product['item']['id'] }}-{{ $i }}">{{ $i }}</option>   
                        @endif
                      @endif                        
                    @endfor
                    @for ($i = 40; $i <= 100; $i = $i+10)
                      @if( $i <= $product['item']['quantity'] )
                        <option value="{{ $product['item']['id'] }}-{{ $i }}">{{ $i }}</option> 
                      @endif                        
                    @endfor
                  </select>

                  {{-- <!--
                  {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
                    @foreach($products as $product)
                      <option value="{{ $product['item']['id'] }}-1">1</option> 
                      <option value="{{ $product['item']['id'] }}-2">2</option>
                      <option value="{{ $product['item']['id'] }}-3">3</option>
                      <option value="{{ $product['item']['id'] }}-4">4</option>
                      <option value="{{ $product['item']['id'] }}-5">5</option>
                    @endforeach                  
                  <a class="cart_quantity_down" href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}"> - </a>                    
                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $product['qty'] }}" autocomplete="off" size="2" readonly>
                  <a class="cart_quantity_up" href="{{ route('product.addByOne', ['id' => $product['item']['id']]) }}"> + </a>

                  
                  <input type="text" name="quantity" min="1" max="500" value="{{ $product['qty'] }}">
                  <input class="cart_quantity_input" type="text" name="quantity" value="{{ $product['qty'] }}" autocomplete="off" size="2" readonly>
                  <a class="cart_quantity_up" href="{{ route('product.addByOne', ['id' => $product['item']['id']]) }}"> + </a>
                  <a name="addcart" id="addcart" href="#" class="cart_quantity_up"> + </a>
                  <a class="cart_quantity_up userStatus" href="{{ route('product.addByOne', ['id' => $product['item']['id']]) }}"  id="{{$product['item']['id']}}"> + </a>
                  --> --}}
                  

                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price" id="item_total_price_{{$product['item']['id']}}" name="cart_total_price">
                  ${{ $product['item']['price']*$product['qty'] }}
                </p>
              </td>
             <td class="cart_price" align="center">
                <a class="cart_quantity_delete" href="{{ route('product.removeItem', ['id' => $product['item']['id']]) }}"><i class="fa fa-times fa-2x"></i></a>
              </td>
             <td class="cart_price" align="center">
                <a class="cart_quantity_delete" href="{{ route('wishlist.MovetoWishList', ['id' => $product['item']['id']]) }}"><i class="fa fa-heart fa-2x"></i></a>
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
              <li>Cart Sub Total <span class="totalPrice">${{ $totalPrice }}</span></li>
            </ul>
              <a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
          </div>

  {{-- <!-- 
              <div class='wrapper'>
                  <ul id='post'>Please make an ajax call by clicking above...</ul>
              </div>
             
            --> --}}
        </div>
      </div>


    </div>
  </section><!--/#do_action--> 


  @else
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <strong><h1>No Items in Cart</h1></strong>        
      </div>
    </div> 
</div>   
  @endif


@endsection


@section('scripts')


<script type="text/javascript">
var token = '{{ Session::token() }}';
var url = '{{ route('changeqtyitemcart') }}';
</script>



<script type="text/javascript">

$(document).ready(function(){  


    $("select[name='quantity']").change(function(){

        var id_qty = $(this).val();
        var token = $("input[name='_token']").val();

        $.ajax({
            method: "post",
            url: url,
            data: { id_qty: id_qty, _token:token},
            data: { id: $('#shipping_id').val(),  state: $('#state').val(), _token: token, _totalprice: totalprice},
            success: function(data) {
              console.log(data);
                //$('#post').html(data.responseText);
                //$("p.cart_total_price").html('');
                //$("p.cart_total_price").html('$ VERGA');
                //$("p.cart_total_price").html('$ '+data.totalprice);
                $("span.totalPrice").html('');
                $("span.totalPrice").html('$ '+data.totalprice);
                //$("#item_total_price_"+data.id").html('');
                $("#item_total_price_"+data.id).html('$ '+data.itemqtyprice);
                $("span.badge").html(data.totalQty);
                
                //$("p.item_total_price_"+data.id).html('$ '+data.itemqtyprice);
                

            },
            error: function (jqXHR, exception) {
                console.log(jqXHR);
                getErrorMessage(jqXHR, exception);
            },
        });



    
    });

    // This function is used to get error message for all ajax calls
    function getErrorMessage(jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
            //alert('Internal error: ' + jqXHR.responseText);

        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        $('#post').html(msg);
    }


});

</script>    




@endsection