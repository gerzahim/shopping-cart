@extends('layouts.cleancontent')

@section('content')

  @if(!empty($products))
  

  <div class="row">
      <div class="col-md-12">
       <h2>Wish List </h2>   
      </div>
  </div> 


      <section id="cart_items">
    <div class="container">
<hr>

      <div class="table-responsive cart_info">
        <table class="table table-condensed" border="0">

          <thead>
            <tr class="cart_menu">
              <td class="image" width="10%">Item</td>
              <td class="description" width="40%">Description</td>
              <td class="price" width="10%">Price</td>
              <td class="quantity" width="15%">Quantity</td>
              <td class="total" width="10%">Total</td>
              <td class="description" width="5%">Delete</td>
              <td class="description" align="center" width="10%">Move to Cart</td>
            </tr>
          </thead>

          <tbody>


            @foreach($products as $product)
              <tr>
                <td class="">
                  <a href="">
                  {{--
                  <img height="110px" width="110px" src="media/{{ $product['imagepath']}}" alt="">
                  --}}
                  
                  <img id="currentPhoto" height="110px" width="110px" src="media/{{ $product['imagepath']}}" onerror="this.src='{{ URL::to('/images/') }}/no-image.jpg'" width="110px" height="110px">
                  </a>
                </td>

                <td class="cart_description">
                  <h4><a href="">{{ $product['title'] }}</a></h4>
                  <p>Sku: {{ $product['sku'] }}</p>
                </td>

                <td class="cart_price">
                  <p>${{ $product['price'] }}</p>
                </td>

                <td class="cart_quantity">
                  <div class="cart_quantity_button">
                    <a class="cart_quantity_down" href="{{ route('wishlist.reduceByOne', ['id' => $product['id']]) }}"> - </a>
                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $quantity[$product['id']]['qty'] }}" autocomplete="off" size="2" readonly>
                    <a class="cart_quantity_up" href="{{ route('wishlist.addByOne', ['id' => $product['id']]) }}"> + </a>
                  </div>
                </td>

                <td class="cart_total">
                  <p class="cart_total_price">${{ $product['price']*$quantity[$product['id']]['qty'] }}</p>
                </td>

                <td class="cart_price" align="center">
                  <a class="cart_quantity_delete" href="{{ route('wishlist.removeItem', ['id' => $product['id']]) }}"><i class="fa fa-times fa-2x"></i></a>
                </td>

                <td class="cart_total" align="center">
                  <a class="cart_quantity_delete" href="{{ route('wishlist.MovetoCart', ['id' => $product['id']]) }}"><i class="fa fa-shopping-cart fa-2x"></i></a>
                </td>  
                            
              </tr>
            @endforeach

 

          </tbody>
        </table>

        
      </div>





    </div>
  </section> <!--/#cart_items-->



  @else
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <strong><h1>No Items in WishList</h1></strong>        
      </div>
    </div> 
</div> 
  @endif




            


@endsection