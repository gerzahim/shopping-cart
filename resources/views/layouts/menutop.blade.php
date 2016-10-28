<!-- BEGIN MENUTOP -->
   <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="{{ url('/') }}" class="active">Home</a></li>
                <li class="dropdown"><a href="{{ url('/shop') }}">Shop<i class="fa fa-angle-down"></i></a>
                  <ul role="menu" class="sub-menu">
                      <li><a href="{{ url('/shop') }}">Products</a></li>
                  </ul>
                </li>
                <li><a href="{{ url('/account') }}">Account</a></li> 
                <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                <li><a href="{{ route('product.shoppingCart') }}">Cart</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
              </ul>
            </div>
            
          </div>
          
          <div class="col-sm-4">
            <div class="search_box pull-right">
            <form action="{{ url('search') }}" id="main-contact-form" class="searchformhh" name="contact-form" method="get">
              <input type="text" name="search" id="search" placeholder="Search"/>
              <button type="submit" class=""><i class="fa fa-search" aria-hidden="true"></i></button>  
              {{ csrf_field() }} 
            </form>
            </div>
          </div>
   
        </div>
      </div>
    </div><!--/header-bottom-->

<!-- END MENUTOP -->
