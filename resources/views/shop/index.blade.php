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
    <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif
      @endforeach
    </div>  
    </div> 
  <div class="col-sm-9 padding-right">       
    <div class="features_items"><!--features_items-->
      <h2 class="title text-center">Features Items</h2>
        @if (count($products) > 0)
            @foreach( $products as $product)
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                        {{--
                          
                            <object  height="249px" width="249px" data="{{ URL::to('/images/') }}/no-image.jpg" type="image/jpg">
                              <img height="249px" width="249px" src="{{ URL::to('/media/') }}/{{ $product->imagepath}}" alt="" />
                            </object> 
                          
                          <img height="249px" width="249px" src="{{ URL::to('/media/') }}/{{ $product->imagepath}}" alt="" />

                          --}}
                          <a href="{{ route('product.seeDetails', ['id' => $product->id]) }}">
                            @if( file_exists(URL::to('/media/')).$product->imagepath) 
                                <img id="currentPhoto" src="{{ URL::to('/media/') }}/{{ $product->imagepath}}" onerror="this.src='{{ URL::to('/images/') }}/no-image.jpg'" width="249px" height="249px">
                            @else
                              <img height="249px" width="249px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" />
                            @endif  
                          </a>
                          
                          @if( $setting->loginshowprices == 0)
                            <h2>${{ $product->price}}</h2>
                          @else
                            @if (Auth::guest())
                              <h2>Login for Price</h2>
                            @else
                              <h2>${{ $product->price}}</h2>
                            @endif                            
                          @endif
                          <p>{!!html_entity_decode($product->title)!!}</p>
                          <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        {{-- 
                        <div class="product-overlay">
                          <div class="overlay-content">
                            <h2>${{ $product->price}}</h2>
                            <p>{{ $product->title}}</p>
                            <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                          </div>
                        </div>
                        --}}
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="{{ route('product.addToWishlist', ['id' => $product->id]) }}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="{{ route('product.seeDetails', ['id' => $product->id]) }}"><i class="fa fa-eye"></i>See Details</a></li>
                        </ul>
                    </div>
                  </div>
                </div>      
            @endforeach
        @else
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
              <div id="charge-message" class="alert alert-success">
                <p>No Results Found !!!</p>      
              </div>
            </div>        
        @endif


    </div>

    {{ $products->links() }}
  </div> 

@endsection