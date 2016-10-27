<!-- BEGIN HEADER -->

    <div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                {{--
                <!-- 
                <li><a href="#"><i class="fa fa-phone"></i> +1 786-464-1348</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> thehookahexpress@gmail.com</a></li> 
                <li><a href="#"><i class="fa fa-phone"></i> +1 954-790-2620</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> hmitha@gmail.com </a></li>
                -->
                --}}                
                <li><a href="#"><i class="fa fa-phone"></i> {{ $setting->phone_site }}</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> {{ $setting->email_site }}</a></li>                 
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="social-icons pull-right">
              <ul class="nav navbar-nav">
                <li><a href="{{ $setting->link_facebook }}"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{ $setting->link_twitter }}"><i class="fa fa-instagram"></i></a></li>
                <li><a href="{{ $setting->link_twitter }}"><i class="fa fa-twitter"></i></a></li>
                

                {{-- 
                <li><a href="{{ $setting->link_linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="{{ $setting->link_dribbble }}"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="{{ $setting->link_google_plus }}"><i class="fa fa-google-plus"></i></a></li>
                --}}
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
                {{-- <!--
                <div class="logo pull-left">
                  <a href="{{ url('/') }}"><img width="150px" height="120px" src="{{ URL::to('images/Logoherbnkulture.png') }}" alt="" /></a>
                </div>
                <div class="lema pull-right">
                  <a href="{{ url('/') }}"><img width="380px" height="100px" src="{{ URL::to('images/Lema1.jpg') }}" alt="" /></a>
                </div>

                <div class="logo pull-left">
                  <a href="{{ url('/') }}"><img width="150px" height="150px" src="{{ URL::to('images/CrownTrading.png') }}" alt="" /></a>
                </div>

                <div class="lema pull-right">
                  <a href="{{ url('/') }}"><img width="400px" height="120px" src="{{ URL::to('images/Lema.jpg') }}" alt="" /></a>
                </div>                  
                -->
                --}}  
                @if($setting->has_lema == '1')
                  <div class="logo pull-left">
                    <a href="{{ url('/') }}"><img width="{{$setting->logo_home_width}}px" height="{{$setting->logo_home_height}}px" src="{{ URL::to('images/') }}/{{$setting->logo_home}}" alt="" /></a>
                  </div>
                  <div class="lema pull-right">
                    <a href="{{ url('/') }}"><img width="{{$setting->lema_home_width}}px" height="{{$setting->lema_home_height}}px" src="{{ URL::to('images/') }}/{{$setting->lema_home}}" alt="" /></a>
                  </div>    
                @else
                  <div class="logo pull-left">
                    <a href="{{ url('/') }}"><img  height="{{$setting->logo_home_height}}px" src="{{ URL::to('images/') }}/{{$setting->logo_home}}" alt="" /></a>
                  </div>   
                @endif

                         

          </div>            
<!--            
            <div class="btn-group pull-right">
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                  USA
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Canada</a></li>
                  <li><a href="#">UK</a></li>
                </ul>
              </div>
              
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                  DOLLAR
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Canadian Dollar</a></li>
                  <li><a href="#">Pound</a></li>
                </ul>
              </div>
            </div>
          </div>
          -->
          <div class="col-sm-6">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">
                @if (Auth::guest())                
                  <li><a href="{{ url('/wishlist') }}"><i class="fa fa-heart"></i> Wishlist</a></li>
                  <li><a href="{{ url('/checkout') }}"><i class="fa fa-credit-card"></i> Checkout</a></li>
                  <li><a href="{{ route('product.shoppingCart') }}"><i class="fa fa-shopping-cart"></i> Cart
                  <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                  </a></li>
                  @if($setting->kind_web == '2')
                    <li><a href="{{ url('/signupw') }}"><i class="fa fa-briefcase"></i> Wholesale Registration</a></li>
                  @else
                    <li><a href="{{ url('/register') }}"><i class="fa fa-user"></i> Join Now</a></li> 
                  @endif    

                  @if($setting->approve_user == '1')
                    <li><a href="{{ url('/loginap') }}"><i class="fa fa-lock"></i> Login</a></li>
                  @else
                    <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                  @endif                              
                  
                  
                @else                
                  <li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Account</a></li>
                  <li><a href="{{ url('/wishlist') }}"><i class="fa fa-heart"></i> Wishlist</a></li>
                  <li><a href="{{ url('/checkout') }}"><i class="fa fa-credit-card"></i> Checkout</a></li>
                  <li><a href="{{ route('product.shoppingCart') }}"><i class="fa fa-shopping-cart"></i> Cart
                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a>
                  </li>
                  <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
                @endif
              </ul>
            </div>

             @if (Auth::guest())  
              <div class="pull-right">
                <form action="{{ url('postsubscribers') }}" id="main-contact-form" class="searchform" name="contact-form" method="post">
                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @else
                    @if(Session::has('message_header'))
                      <div class="alert alert-success">
                        {{ Session::get('message_header') }}
                      </div>
                    @else
                      <p>Get the most recent updates from our site...</p>    
                    @endif                      
                  @endif 

                  <input type="email" name="email" required="required" placeholder="Your email address" />
                  {{ csrf_field() }}  
                  <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>   
                </form>
              </div>
            @else
              <div class="pull-right">
              <p>
                  <h4>Hello, {{ Auth::user()->name }}</h4>
              </p>  
              </div>
            @endif
        
          </div>
        </div>
      </div>
    </div><!--/header-middle-->
  
 

<!-- END HEADER -->
