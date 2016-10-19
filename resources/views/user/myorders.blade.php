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
							<div class="panel-body">
								<ul class="list-group">
									@foreach($order->cart->items as $item)
										<li class="list-group-item">
											<span class="badge">${{ $item['price'] }}</span>
											{{ $item['item']['title'] }} | <strong> Sku: </strong> {{ $item['item']['sku'] }} | <strong> {{ $item['qty'] }} </strong> Units 
										</li>
									@endforeach
								</ul>
							</div>
							<div class="panel-footer">
								<strong>
									<p>SubTotal: ${{ $order->cart->totalPrice }}</p>
									<p>Shipping: ${{ $order->cart->shippingCost }}</p>
									<p>Total Cost: ${{ $order->cart->totalCost }}</p>
									@if($order->status == '1')
										<p>Status: Pending to Delivery</p>
									@else
										<p>Status: Out to Delivery</p>
										<p>Shipping Company: {{ $order->shipcompany }}</p>
										<p>Tracking Number: {{ $order->tracking }}</p>
									@endif
								</strong>
							</div>
						</div>
					@endforeach
				</div>
			</div>	

			
		</div>

	</section> <!--/#cart_items-->


@endsection

