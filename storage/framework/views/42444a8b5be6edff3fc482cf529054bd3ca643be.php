﻿

<?php $__env->startSection('content'); ?>

<div id="page-wrapper" > 
            <div id="page-inner">
                  <?php if(Session::has('message')): ?>
                      <div class="alert alert-success">
                          <?php echo e(Session::get('message')); ?>

                      </div>
                  <?php endif; ?>             
                <div class="row">
                    <div class="col-md-12">
                     <h2>List Banners </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  

  <section id="cart_items">

    <div class="col-md-12">
<hr>
      <div class="table-responsive cart_info">

        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Imagen Banner</td>
              <td class="quantity">Title</td>       
              <td class="quantity">Edit</td>
            </tr>
          </thead>
          <tbody>
         <?php echo $tree; ?>      
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="price"></td>
              <td class="price"></td>
              <td class="total"></td>
            </tr>            
          </tfoot>
        </table>

      </div>





    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>