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
											<?php echo e($item['item']['title']); ?> | <strong> Sku: </strong> <?php echo e($item['item']['sku']); ?> | <strong> <?php echo e($item['qty']); ?> </strong> Units 
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<div class="panel-footer">
								<strong>
									<p>SubTotal: $<?php echo e($order->cart->totalPrice); ?></p>
									<p>Tax: $<?php echo e($order->cart->taxCost); ?></p>
									<p>SubTotal + Tax: $<?php echo e($order->cart->totalPrice+$order->cart->taxCost); ?></p>
									<p>Shipping: $<?php echo e($order->cart->shippingCost); ?></p>
									<p>Total Cost: $<?php echo e($order->cart->totalCost); ?></p>
                                             									
									<?php if($order->status == '1'): ?>
										<p>Status: Pending to Delivery</p>
									<?php else: ?>
										<p>Status: Out to Delivery</p>
										<p>Shipping Company: <?php echo e($order->shipcompany); ?></p>
										<p>Tracking Number: <?php echo e($order->tracking); ?></p>
									<?php endif; ?>
								</strong>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>	

			
		</div>

	</section> <!--/#cart_items-->


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>