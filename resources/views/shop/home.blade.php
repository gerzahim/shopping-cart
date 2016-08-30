@extends('layouts.index')

@section('banner')

<!-- BEGIN BANNER -->
  <section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
              <li data-target="#slider-carousel" data-slide-to="1"></li>
              <li data-target="#slider-carousel" data-slide-to="2"></li>
            </ol>
            
            <div class="carousel-inner">
              @foreach( $banners as $banner)
                <div class="item {{ $banner->active }}">
                  <div class="col-sm-6">
                    <h1><span>{{ $banner->text_red }}</span>{{ $banner->text_gray }}</h1>
                    <h2>{{ $banner->title }}</h2>
                    <p>{{ $banner->description }}</p>
                    <button type="button" class="btn btn-default get">{{ $banner->button }}</button>
                  </div>
                  <div class="col-sm-6">
                    <img src="media/{{ $banner->imagepath }}" class="girl img-responsive" alt="" />
                    @if (!$banner->imagepath_price == '')
                      <img src="media/{{ $banner->imagepath_price }}"  class="pricing" alt="" />
                    @endif  
                  </div>
                </div>
              @endforeach
            </div>
            
            
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
          
        </div>
      </div>
    </div>
  </section><!--/slider-->
<!-- END BANNER -->
@endsection



@section('content')
  
  @if(Session::has('success'))
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
      <div id="charge-message" class="alert alert-success">
        {{ Session::get('success') }}        
      </div>
    </div>
  @endif

  <div class="col-sm-9 padding-right">       
    <div class="features_items"><!--features_items-->
      <h2 class="title text-center">Features Items</h2>
        @foreach( $products as $product)
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="media/{{ $product->imagepath}}" alt="" />
                      <h2>${{ $product->price}}</h2>
                      <p>{{ $product->title}}</p>
                      <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h2>${{ $product->price}}</h2>
                        <p>{{ $product->title}}</p>
                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                    </div>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i>See Details</a></li>
                  </ul>
                </div>
              </div>
            </div>      

        @endforeach
    </div>
  </div>    

            


@endsection