@extends('layouts.index')



@section('head')
<link href="{{ URL::to('engine_gallery/style.css') }}" rel="stylesheet">

@endsection

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
              <div class="view-producta">                      
                {{-- 
                <img height="" width="" src="{{ URL::to('media/') }}/{{ $product->imagepath}}" alt="">
                
                @if( file_exists(URL::to('/media/')).$product->imagepath)
                  <img height="" width="" src="{{ URL::to('media/') }}/{{ $product->imagepath}}" alt=""> 
                @else
                  <img height="300px" width="300px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" />
                @endif                 
                <!--h3>ZOOM</h3-->

                --}}
                <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
                  <div id="wowslider-container1">
                    <div class="ws_images">
                      <ul>
                        <li>
                          @if( file_exists(URL::to('/media/')).$product->imagepath)
                            <a target="_blank" href="{{ URL::to('media/') }}/{{ $product->imagepath}}">
                              <img height="300px" width="300px" src="{{ URL::to('media/') }}/{{ $product->imagepath}}" alt="" title="" id="wows1_0"/>
                            </a>          
                          @else
                            <img height="300px" width="300px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" title="" id="wows1_0"/> 
                          @endif  
                        </li>
                        @foreach($imgproducts as $imgproduct)
                            <li>
                              <a target="_blank" href="{{ URL::to('media/') }}/{{ $imgproduct->imagepath1}}">
                                <img height="300px" width="300px" src="{{ URL::to('media/') }}/{{ $imgproduct->imagepath1}}" alt="" title="" id="wows1_1"/>
                              </a>
                            </li>
                        @endforeach
                        <!--
                        <li><img width="300px" height="300px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" title="" id="wows1_1"/></li>
                        <li><img width="300px" height="300px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" title="" id="wows1_2"/></li>
                        <li><img width="300px" height="300px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" title="" id="wows1_3"/></li>
                        <li><a href="http://wowslider.com/vi"><img width="300px" height="300px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="bootstrap carousel" title="" id="wows1_4"/></a></li>
                        <li><img width="300px" height="300px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" title="" id="wows1_5"/></li>
                        -->
                      </ul>
                    </div>
                    <div class="ws_thumbs">
                      <div>
                          @if( file_exists(URL::to('/media/')).$product->imagepath)
                            <a href="#wows1_0" title=""><img width="48px" height="48px" src="{{ URL::to('media/') }}/{{ $product->imagepath}}" alt="" /></a> 
                          @else
                            <a href="#wows1_0" title=""><img width="48px" height="48px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" /></a>
                          @endif

                          @foreach($imgproducts as $imgproduct)
                              <a href="#wows1_0" title="">
                                <img height="48px" width="48px" src="{{ URL::to('media/') }}/{{ $imgproduct->imagepath1}}" alt="" />
                              </a>
                          @endforeach                                                 
                        <!-- 
                        <a href="#wows1_0" title=""><img width="48px" height="48px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" /></a>
                        <a href="#wows1_1" title=""><img width="48px" height="48px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" /></a>
                        <a href="#wows1_2" title=""><img width="48px" height="48px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" /></a>
                        <a href="#wows1_3" title=""><img width="48px" height="48px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" /></a>
                        <a href="#wows1_4" title=""><img width="48px" height="48px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" /></a>
                        <a href="#wows1_5" title=""><img width="48px" height="48px" src="{{ URL::to('/images/') }}/no-image.jpg" /></a>
                        -->
                      </div>
                    </div>
                    <div class="ws_shadow"></div>
                  </div>
                  <!-- End WOWSlider.com BODY section -->
              </div>
            </div>
            <div class="col-sm-7">
              <div class="product-information"><!--/product-information-->
                <img src="{{ URL::to('images/new.jpg') }}" class="newarrival" alt="" />
                <h2>{{ $product->title}}</h2>
                <p><b>Sku:</b> {{ $product->sku}}</p>
                <!-- 
                <img src="{{ URL::to('images/rating.png') }}" alt="" />
                -->
                <span>
                          @if( $setting->loginshowprices == 0)
                            <span>${{ $product->price}}</span>
                          @else
                            @if (Auth::guest())
                              <span>Login for Price</span>
                            @else
                              <span>${{ $product->price}}</span>
                            @endif                            
                          @endif
                          <br>                
                  <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Description:</b> {{ $product->description }}</p>
                    @foreach($attributesproducts as $attributesproduct)
                    <p><b>
                    {{ $attributeName[$attributeId[$attributesproduct->attributes_values_id]] }}: 
                    </b>
                      {{ $attributeValueName[$attributesproduct->attributes_values_id] }}
                    </p>
                    @endforeach 
                    <br>
                    @foreach($listassociates as $listassociate)
                    <p>Compare by:<b>
                    {{ $listassociate['name'] }}: 
                    </b><br> 
                     @foreach($listassociate['ids'] as $listassociat)
                      <a target="_blank" href="{{ URL::to('/see-details/') }}/{{ $listassociat->id }}" title="{{ $listassociat->sku }}">
                        <img height="70px" width="70px" src="{{ URL::to('media/') }}/{{ $listassociat->imagepath }}" alt="" />
                      </a>                      
                     @endforeach  
                    </p>
                    <br>
                    @endforeach                
                <!-- 
                <a href=""><img src="{{ URL::to('images/share.png') }}" class="share img-responsive"  alt="" /></a>
                -->
              </div><!--/product-information-->
            </div>
          </div><!--/product-details-->
  </div>    
@endsection

@section('scripts')
  <script src="{{ URL::to('engine_gallery/wowslider.js') }}"></script>
  <script src="{{ URL::to('engine_gallery/script.js') }}"></script>  
@endsection