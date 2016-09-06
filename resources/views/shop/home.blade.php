@extends('layouts.index')

 @include('layouts.banner1')

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
    <div class="features_items"><!--features_items-->
      <h2 class="title text-center">Features Items</h2>
        @if (count($products) > 0)
            @foreach( $products as $product)
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                          <img height="249px" width="249px" src="{{ URL::to('/media/') }}/{{ $product->imagepath}}" alt="" />
                          <h2>${{ $product->price}}</h2>
                          <p>{{ $product->title}}</p>
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
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
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
        {{ $products->links() }}
    </div>
    
{{-- 
<div class="category-tab"><!--category-tab-->
  <div class="col-sm-12">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
      <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
      <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
      <li><a href="#kids" data-toggle="tab">Kids</a></li>
      <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
    </ul>
  </div>
  <div class="tab-content">
    <div class="tab-pane fade active in" id="tshirt" >
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="media/BT103.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="media/DT102.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="media/DT103.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="media/BT102.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    <div class="tab-pane fade" id="blazers" >
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery4.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery3.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery2.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery1.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    <div class="tab-pane fade" id="sunglass" >
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery3.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery4.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery1.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery2.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    <div class="tab-pane fade" id="kids" >
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery1.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery2.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery3.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery4.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    <div class="tab-pane fade" id="poloshirt" >
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery2.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery4.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery3.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/gallery1.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!--/category-tab-->    

--}}
  </div>

@endsection


