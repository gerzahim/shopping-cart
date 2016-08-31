@extends('layouts.index')

@include('layouts.sidebar1')

@section('content')
  
  @if(Session::has('success'))
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
      <div id="charge-message" class="alert alert-success">
        {{ Session::get('success') }}        
      </div>
    </div>
  @endif

  <div class="col-sm-9 padding-right">  
          <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
              <div class="view-product">
                <img src="media/{{ $product->imagepath}}"" alt="" />
                <h3>ZOOM</h3>
              </div>
            </div>
            <div class="col-sm-7">
              <div class="product-information"><!--/product-information-->
                <img src="images/new.jpg" class="newarrival" alt="" />
                <h2>{{ $product->title}}</h2>
                <p>Web ID: 1089772</p>
                <img src="images/product-details/rating.png" alt="" />
                <span>
                  <span>${{ $product->price}}</span>
                  <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> ${{ $product->price}}</p>
                <a href=""><img src="images/share.png" class="share img-responsive"  alt="" /></a>
              </div><!--/product-information-->
            </div>
          </div><!--/product-details-->
  </div>    
@endsection