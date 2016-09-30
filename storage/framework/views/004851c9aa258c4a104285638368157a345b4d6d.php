<?php $__env->startSection('content'); ?>

	<section id="cart_items">
		<div class="container">
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<?php foreach($errors->all() as $error): ?>
					<p><?php echo e($error); ?></p>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			
			<?php if(Session::has('message')): ?>
			    <div class="alert alert-success">
			        <?php echo e(Session::get('message')); ?>

			    </div>
			<?php endif; ?>		
				
			<div class="step-one">
				<h2 class="heading">Your Account</h2>
			</div>			
			<div class="shopper-informations">
				<div class="row">
				<div class="col-sm-3"></div>
					<div class="col-sm-5">
						<div class="shopper-info">

						    <div class="col-sm-12" id="rcorners2">
						        <div class="col-sm-6">
						        	<div class="">
							            <h4 class="">Orders</h4>
							            <i class="fa fa-shopping-cart fa-3x"" aria-hidden="true"></i><br>
							            <span class="abase">Recent Orders</span>                
						            </div>
						        </div>
						        <div class="col-sm-6">
						            <div class="a-row">
						            	<h4 class=""></h4>
						            	<a href="<?php echo e(url('/myorders')); ?>">Your Orders</a>
						            </div>
						        </div>							
							</div>
						    <div class="col-sm-12" id="rcorners2">
						        <div class="col-sm-6">
						        	<div class="a-row">
							            <h4 class="">Profile</h4>
							            <i class="fa fa-user fa-3x" aria-hidden="true"></i><br>
							            <span class="abase">Name, Password & Address</span>                
						            </div>
						        </div>
						        <div class="col-sm-6">
						            <div class="a-row">
										<h4 class=""></h4>						            
						            	<a href="<?php echo e(url('/useredit')); ?>" >Update Account</a>
						            </div>
						        </div>							
							</div>							
					</div>						
				</div>
			</div>
			
		</div>

	</section> <!--/#cart_items-->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>