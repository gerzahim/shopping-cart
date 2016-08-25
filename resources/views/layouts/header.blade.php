<!-- BEGIN HEADER -->

    <div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href="#"><i class="fa fa-phone"></i> +1 786-464-1348</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> thehookahexpress@gmail.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="social-icons pull-right">
              <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
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
            <div class="logo pull-left">
              <a href="{{ url('/home') }}"><img width="150px" height="120px" src="images/Logoherbnkulture.png" alt="" /></a>
            </div>
            <div class="lema pull-right">
              <a href="{{ url('/') }}"><img width="380px" height="100px" src="images/Lema1.jpg" alt="" /></a>
            </div>              
            <!--
            <div class="logo pull-right">
              <a href="index.html"><img width="380px" height="100px" src="images/Lema.jpg" alt="" /></a>
            </div>
            -->
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
                  <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                  <li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                  <li><a href="{{ route('product.shoppingCart') }}"><i class="fa fa-shopping-cart"></i> Cart
                  <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                  </a></li>
                  <li><a href="{{ url('/register') }}"><i class="fa fa-user"></i> Join Now</a></li>
                  <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                @else                
                  <li><a href="{{ url('/useredit') }}"><i class="fa fa-user"></i> Account</a></li>
                  <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                  <li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                  <li><a href="{{ route('product.shoppingCart') }}"><i class="fa fa-shopping-cart"></i> Cart
                  <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                  </a></li>
                  <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
                @endif
              </ul>
            </div>

             @if (Auth::guest())  
              <div class="pull-right">
                <form action="#" class="searchform">
                  <p>Get the most recent updates from our site...</p>
                  <input type="text" placeholder="Your email address" />
                  <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>   
                </form>
              </div>
            @else
              <div class="pull-right">
              <p>
                  <h4>Hello, Gerzahim Salas</h4>
              </p>  
              </div>
            @endif
        
          </div>
        </div>
      </div>
    </div><!--/header-middle-->
  
 

<!-- END HEADER -->
