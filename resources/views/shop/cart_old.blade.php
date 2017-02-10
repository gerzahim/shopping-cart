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
              <td class="description" width="40%">Item</td>
              <td class="price" width="10%">Price</td>
              <td class="quantity" width="15%">Quantity</td>
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
                  <a class="cart_quantity_down" href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}"> - </a>                    
                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $product['qty'] }}" autocomplete="off" size="2" readonly>
                  <a class="cart_quantity_up" href="{{ route('product.addByOne', ['id' => $product['item']['id']]) }}"> + </a>

                  {{-- <!--
                  <input type="text" name="quantity" min="1" max="500" value="{{ $product['qty'] }}">
                  <input class="cart_quantity_input" type="text" name="quantity" value="{{ $product['qty'] }}" autocomplete="off" size="2" readonly>
                  <a class="cart_quantity_up" href="{{ route('product.addByOne', ['id' => $product['item']['id']]) }}"> + </a>
                  <a name="addcart" id="addcart" href="#" class="cart_quantity_up"> + </a>
                  <a class="cart_quantity_up userStatus" href="{{ route('product.addByOne', ['id' => $product['item']['id']]) }}"  id="{{$product['item']['id']}}"> + </a>
                  --> --}}
                  

                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">${{ $product['item']['price']*$product['qty'] }}</p>
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
              <li>Cart Sub Total <span>${{ $totalPrice }}</span></li>
            </ul>
              <a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
          </div>
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
var url = '{{ route('addtocart') }}';
</script>



<script type="text/javascript">

$(document).ready(function(){  


    $("#addcart").click(function(e){ 

            e.preventDefault();
            var category = $(e.target).text();

            alert(category);

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
      
      
    });

});

</script>    




@endsection