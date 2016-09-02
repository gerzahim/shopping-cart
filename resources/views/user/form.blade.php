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
			<div class="shopper-informations">
				<div class="row">
				<div class="col-sm-3"></div>
					<div class="col-sm-5">
						<div class="shopper-info">
							<p>Personal Information</p>
								<form action="{{ route('userupdate', $user->id) }}"  method="post" id="upd-form-user"> 
									<div class="form-group">
						                <label for="email">Email:</label>
						                <input type="text" id="email" class="form-control" placeholder="{{ $user['email'] }}" readonly>										
									</div>
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" id="name" class="form-control" name="name" placeholder="{{ $user['name'] }}">
									</div>   															
									<div class="form-group">
										<label for="name">Password</label>
										<input type="password" id="password" class="form-control" name="password" placeholder="Leave Password blank if don't want to change">
									</div>   																				
									<div class="bill-to">
										<p>Bill To</p>
									</div>
									<div class="form-group">
						                <label for="address">Address:</label>
						                <input type="text" id="address" class="form-control" name="address" placeholder="{{ $user['address'] }}">
									</div>
									<div class="form-group">
						                <label for="city">City:</label>
						                <input type="text" id="city" class="form-control" name="city" placeholder="{{ $user['city'] }}">
									</div>
									<div class="form-group">
						                <label for="state">State:</label>
						                <input type="text" id="state" class="form-control" name="state" placeholder="{{ $user['state'] }}">
									</div>
									<div class="form-group">
						                <label for="zip">Zip Code:</label>
						                <input type="text" id="zip" class="form-control" name="zip" placeholder="{{ $user['zip'] }}">
									</div>
									<div class="form-group">
						                <label for="country">Country:</label>
						                <input type="text" id="country" class="form-control" name="country" placeholder="{{ $user['country'] }}">
									</div>
									<div class="form-group">
						                <label for="phone">Telephone:</label>
						                <input type="text" id="phone" class="form-control" name="phone" placeholder="{{ $user['phone'] }}">		
									</div>
						
						          {{ csrf_field() }}
						          <button type="submit" class="btn btn-success">Update Info</button>
						        </form>
						</div>
					</div>						
				</div>
			</div>
			
		</div>

	</section> <!--/#cart_items-->


@endsection