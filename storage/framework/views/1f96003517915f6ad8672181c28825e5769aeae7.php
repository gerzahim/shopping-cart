<!-- BEGIN FOOTER -->
 <footer id="footer"><!--Footer-->
    
    <div class="footer-widget">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>Service</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo e(URL::to('contact')); ?>">Contact Us</a></li>
                <li><a href="<?php echo e(URL::to('myorders')); ?>">Order Status</a></li>
                <li><a href="<?php echo e(URL::to('faqs')); ?>">FAQ’s</a></li>
                <li><a href="<?php echo e(URL::to('admin')); ?>">Backend</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>Quick Shop</h2>
              <ul class="nav nav-pills nav-stacked">
                <?php if($setting->quick_cat_id1 != 0): ?>
                  <li><a href="<?php echo e(URL::to('selectByCategory')); ?>/<?php echo e($setting->quick_cat_id1); ?>"> <?php echo e($setting->quick_cat_name1); ?> </a></li>
                <?php endif; ?>
                <?php if($setting->quick_cat_id2 != 0): ?>
                  <li><a href="<?php echo e(URL::to('selectByCategory')); ?>/<?php echo e($setting->quick_cat_id2); ?>"> <?php echo e($setting->quick_cat_name2); ?> </a></li>
                <?php endif; ?>
                <?php if($setting->quick_cat_id3 != 0): ?>
                  <li><a href="<?php echo e(URL::to('selectByCategory')); ?>/<?php echo e($setting->quick_cat_id3); ?>"> <?php echo e($setting->quick_cat_name3); ?> </a></li>
                <?php endif; ?>
                <?php if($setting->quick_cat_id4 != 0): ?>
                  <li><a href="<?php echo e(URL::to('selectByCategory')); ?>/<?php echo e($setting->quick_cat_id4); ?>"> <?php echo e($setting->quick_cat_name4); ?> </a></li>
                <?php endif; ?>
                <?php if($setting->quick_cat_id5 != 0): ?>
                  <li><a href="<?php echo e(URL::to('selectByCategory')); ?>/<?php echo e($setting->quick_cat_id5); ?>"> <?php echo e($setting->quick_cat_name5); ?> </a></li>
                <?php endif; ?>                                                                
                                                
              </ul>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>Policies</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo e(URL::to('terms')); ?>">Terms of Use</a></li>
                <li><a href="<?php echo e(URL::to('policy')); ?>">Privacy Policy</a></li>
                <li><a href="<?php echo e(URL::to('shipping')); ?>">Shipping</a></li>
                <li><a href="<?php echo e(URL::to('refunds')); ?>">Returns</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>About Shopper</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo e(URL::to('aboutus')); ?>">Company Information</a></li>
              </ul>
            </div>
          </div>

          <div class="col-sm-3 col-sm-offset-1">
            <div class="companyinfo">
              <?php
               $keywords = preg_split("/[\s,]+/", $setting->name_site);
              ?>
              <h2><span><?php echo e($keywords[0]); ?></span> - <?php echo e($keywords[1]); ?></h2>
            </div>
            <?php if( $setting->dark_menu == '1'): ?>
              <div class="address">
                <img src="<?php echo e(URL::to('images/')); ?>/<?php echo e($setting->img_map); ?>" alt="" />           
              </div>
              <div  class="companyaddress" align="center">
                <p><?php echo e($setting->address_site); ?></p>
              </div>                          
            <?php else: ?>
              <div class="address">
                <img src="<?php echo e(URL::to('images/')); ?>/<?php echo e($setting->img_map); ?>" alt="" />
                <p><?php echo e($setting->address_site); ?></p>
              </div>
              
            <?php endif; ?>
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
