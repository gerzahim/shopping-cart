<!-- BEGIN FOOTER -->
 <footer id="footer"><!--Footer-->
    
    <div class="footer-widget">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>Service</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ URL::to('contact') }}">Contact Us</a></li>
                <li><a href="{{ URL::to('myorders') }}">Order Status</a></li>
                <li><a href="{{ URL::to('faqs') }}">FAQ’s</a></li>
                <li><a href="{{ URL::to('admin') }}">Backend</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>Quick Shop</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ URL::to('selectByCategory') }}/{{$setting->quick_cat_id1}}"> {{$setting->quick_cat_name1}} </a></li>
                <li><a href="{{ URL::to('selectByCategory') }}/{{$setting->quick_cat_id2}}"> {{$setting->quick_cat_name2}} </a></li>
                <li><a href="{{ URL::to('selectByCategory') }}/{{$setting->quick_cat_id3}}"> {{$setting->quick_cat_name3}} </a></li>
                <li><a href="{{ URL::to('selectByCategory') }}/{{$setting->quick_cat_id4}}"> {{$setting->quick_cat_name4}} </a></li>
                <li><a href="{{ URL::to('selectByCategory') }}/{{$setting->quick_cat_id5}}"> {{$setting->quick_cat_name5}} </a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>Policies</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ URL::to('terms') }}">Terms of Use</a></li>
                <li><a href="{{ URL::to('policy') }}">Privacy Policy</a></li>
                <li><a href="{{ URL::to('shipping') }}">Shipping</a></li>
                <li><a href="{{ URL::to('refunds') }}">Returns</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>About Shopper</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ URL::to('aboutus') }}">Company Information</a></li>
              </ul>
            </div>
          </div>

          <div class="col-sm-3 col-sm-offset-1">
            <div class="companyinfo">
              <?php
               $keywords = preg_split("/[\s,]+/", $setting->name_site);
              ?>
              <h2><span>{{ $keywords[0] }}</span> - {{ $keywords[1]}}</h2>
            </div>
            @if( $setting->css_site == 'main_doralhooak.css')
              <div class="address">
                <img src="{{ URL::to('images/') }}/{{$setting->img_map}}" alt="" />           
              </div>
              <div  class="companyaddress" align="center">
                <p>{{$setting->address_site}}</p>
              </div>                          
            @else
              <div class="address">
                <img src="{{ URL::to('images/') }}/{{$setting->img_map}}" alt="" />
                <p>{{$setting->address_site}}</p>
              </div>
              
            @endif
          </div>
          
        </div>
      </div>
    </div>
    
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <p class="pull-left">Copyright &copy; <?php echo date("Y") ?>. All rights reserved.</p>
          <p class="pull-right">Designed by Gerza Salas <span>rasce88@gmail.com</span></p>
        </div>
      </div>
    </div>
    
  </footer><!--/Footer-->
<!-- END FOOTER -->
