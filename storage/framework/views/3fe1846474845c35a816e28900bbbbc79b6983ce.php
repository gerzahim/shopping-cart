<?php $__env->startSection('content'); ?>

   <div id="contact-page" class="container">
      <div class="bg">
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success">
                <?php echo e(Session::get('message')); ?>

            </div>
        <?php endif; ?>  
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach($errors->all() as $error): ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>        
        <div class="row">       
          <div class="col-sm-12">                 
          <h2 class="title text-center">Contact <strong>Us</strong></h2>
          <br>                             
        </div>          
      </div>      
        <div class="row">   
          <div class="col-sm-8">
            <div class="contact-form">
              <h2 class="title text-center">Get In Touch</h2>
              <div class="status alert alert-success" style="display: none"></div>
              <form action="<?php echo e(url('contact')); ?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                    <div class="form-group col-md-6">
                        <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                    </div>
                    <?php echo e(csrf_field()); ?>                        
                    <div class="form-group col-md-12">
                        <input type="submit" name="submit" class="btn btn-primary pull-right" value="Send">
                    </div>

                </form>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="contact-info">
              <h2 class="title text-center">Contact Info</h2>
              <address>
                <p>Hookah Express.</p>
                <p>8065 NW 54th St. Doral, FL 33166 USA</p>
                <p>Phone: +1 786-464-1348</p>
                <p>Email: thehookahexpress@gmail.com</p>
              </address>
              <?php /*               
              <!--
              <address>
                <p>Crown Trading Inc.</p>
                <p>2503 NW 72 Ave. Doral, FL 33166 USA</p>
                <p>Phone: +1 954-790-2620</p>
                <p>Email: hmitha@gmail.com</p>
              </address>              

              -->
              */ ?>
              <div class="social-networks">
                <h2 class="title text-center">Social Networking</h2>
              <ul>
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-youtube"></i></a>
                </li>
              </ul>
              </div>
            </div>
          </div>          
        </div>  
      </div>  
    </div><!--/#contact-page-->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.cleancontent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>