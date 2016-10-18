@extends('layouts.cleancontent')

@section('content')

  @if(Session::has('cart'))

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
              <td></td>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td class="cart_product">
                <a href=""><img height="110px" width="110px" src="media/{{ $product['imagepath']}}" alt=""></a>
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
                  <input class="cart_quantity_input" type="text" name="quantity" value="{{ $quantity[$product['id']]['qty'] }}" autocomplete="off" size="2">
                  <a class="cart_quantity_up" href="{{ route('product.addToWishlist', ['id' => $product['id']]) }}"> + </a>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">${{ $product['price']*$quantity[$product['id']]['qty'] }}</p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{ route('wishlist.removeItem', ['id' => $product['id']]) }}"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            @endforeach

 

          </tbody>
        </table>
      </div>





    </div>
  </section> <!--/#cart_items-->



  @else
    <div class="row">
      <div class="col-sm6 col-md6 col-md-offset-3 col-sm-offset3">
        <strong>No Items in WishList</strong>        
      </div>
    </div>  
  @endif




            


@endsection