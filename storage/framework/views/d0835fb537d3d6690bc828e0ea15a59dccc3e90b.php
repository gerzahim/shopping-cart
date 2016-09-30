

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Add CSV File </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">

    <div class="container">

    <?php if(Session::has('message')): ?>
      <div class="alert alert-success">
          <?php echo e(Session::get('message')); ?>

      </div>
    <?php endif; ?> 
    
    <?php if($file_found == true): ?>
      <p>File is Upload ! 
      <a href="<?php echo e(URL::to('downloadExcel/xls')); ?>"><button class="btn btn-success">Import CSV FILE</button></a>  
      </p> 
      <br><br><br><br>
      <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="<?php echo e(URL::to('upload-csv')); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
        <br>
        <button class="btn btn-warning">Replace CSV File</button>
                  <?php echo e(csrf_field()); ?>   
      </form>
    <?php else: ?>  
      <a href="<?php echo e(URL::to('downloadExcel/csv')); ?>"><button class="btn btn-primary">Download CSV Sample</button></a><br><br>
      <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="<?php echo e(URL::to('upload-csv')); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
        <br>
        <button class="btn btn-warning">Upload CSV File</button>
                  <?php echo e(csrf_field()); ?>   
      </form>
    <?php endif; ?>


  </div>




  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>