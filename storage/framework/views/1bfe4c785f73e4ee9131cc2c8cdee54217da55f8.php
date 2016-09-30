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
				<h2 class="heading">Account</h2>
			</div>	

			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>My Orders</h2>
					<?php foreach($orders as $order): ?>
						<div class="panel panel-default">
							<div class="panel-body">
								<ul class="list-group">
									<?php foreach($order->cart->items as $item): ?>
										<li class="list-group-item">
											<span class="badge">$<?php echo e($item['price']); ?></span>
											<?php echo e($item['item']['title']); ?> | <?php echo e($item['qty']); ?> Units
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<div class="panel-footer"><strong>Total Price: $<?php echo e($order->cart->totalPrice); ?></strong></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>	

			
		</div>

	</section> <!--/#cart_items-->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>