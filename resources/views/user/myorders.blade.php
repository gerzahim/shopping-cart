@extends('layouts.form')

@section('content')

	<section id="cart_items">
		<div class="container">
			@if(count($errors)>0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $error)
					<p>{{ $error }}</p>
				@endforeach
			</div>
			@endif
			
			@if(Session::has('message'))
			    <div class="alert alert-success">
			        {{ Session::get('message') }}
			    </div>
			@endif		
				
			<div class="step-one">
				<h2 class="heading">Account</h2>
			</div>	

			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>My Orders</h2>
					@foreach($orders as $order)
						<div class="panel panel-default">
							<div class="panel-footer">
									Order Placed: <strong> {{ $order->created_at }} </strong> <br>
									Order #: <strong> {{ $order->id }} </strong>
							</div>
							<div class="panel-body">
								<ul class="list-group">
									@foreach($order->cart->items as $item)
										<li class="list-group-item">
											<span class="badge">${{ $item['price'] }}</span>
											{{ $item['item']['title'] }} | <strong> Sku: </strong> {{ $item['item']['sku'] }} | <strong> {{ $item['qty'] }} </strong> Units 
										</li>
									@endforeach

							</div>
							<div class="panel-footer">
									<strong>Cost Details</strong><br>
									SubTotal: <strong>${{ $order->cart->totalPrice }}</strong><br>
									Tax: <strong>${{ $order->cart->taxCost }}</strong><br>
									SubTotal + Tax: <strong>${{ $order->cart->totalPrice+$order->cart->taxCost }}</strong><br>
									Shipping: <strong>${{ $order->cart->shippingCost }}</strong><br>
									Total Cost: <strong>${{ $order->cart->totalCost }}</strong><br>
                                    <br>      									
 									<strong>Order Status</strong><br>
									@if($order->status == '1')
										Status: <strong>Pending to Delivery</strong><br>
									@else
										Status: <strong>Out to Delivery</strong><br>
										Shipping Company: <strong>{{ $order->shipcompany }}</strong><br>
										Tracking Number: <strong>{{ $order->tracking }}</strong><br>
									@endif
								
							</div>
						</div>
					@endforeach
				</div>
			</div>	

			
		</div>

	</section> <!--/#cart_items-->


@endsection

