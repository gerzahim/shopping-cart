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
			<div class="step-one">
				<h2 class="heading">Account</h2>
			</div>			
			<div class="shopper-informations">
				<div class="row">
				<div class="col-sm-3"></div>
					<div class="col-sm-5">
						<div class="shopper-info">
							<p>Personal Information</p>	
								{!! Form::open(array('action' => 'UserController@edit')) !!}					
								<input type="text" placeholder="Full Name">
								<input type="text" placeholder="Email*">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
								<div class="bill-to">
									<p>Bill To</p>
								</div>
								<input type="text" placeholder="Address">
								<input type="text" placeholder="City">
								<input type="text" placeholder="State">
								<input type="text" placeholder="Zip / Postal Code *">	
								<input type="text" placeholder="Phone *">
								{!! Form::close() !!}
						</div>
					</div>						
				</div>
			</div>
			
		</div>

	</section> <!--/#cart_items-->


@endsection