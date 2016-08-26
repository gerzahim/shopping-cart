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
					<h1>User Profile</h1>
					<hr>
					<h2>My Orders</h2>
					@foreach($orders as $order)
						<div class="panel panel-default">
							<div class="panel-body">
								<ul class="list-group">
									@foreach($order->cart->items as $item)
										<li class="list-group-item">
											<span class="badge">${{ $item['price'] }}</span>
											{{ $item['item']['title'] }} | {{ $item['qty'] }} Units

										</li>
									@endforeach
								</ul>
							</div>
							<div class="panel-footer"><strong>Total Price: ${{ $order->cart->totalPrice }}</strong></div>
						</div>
					@endforeach
				</div>
			</div>	

			
		</div>

	</section> <!--/#cart_items-->


@endsection