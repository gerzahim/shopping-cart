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
								{!!Form::model($user,['action'=>['UserController@update'],'method'=>'POST'])!!} 
								<div class="form-group">
									{!!Form::label('name','Name:')!!}
									{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Full Name'])!!}
								</div>
								<div class="form-group">
									{!!Form::label('email','Email:')!!}
									{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])!!}
								</div>
								<div class="form-group">
									{!!Form::label('password','Password:')!!}
									{!!Form::password('password',['class'=>'form-control','placeholder'=>'Password'])!!}
								</div>							
								<div class="bill-to">
									<p>Bill To</p>
								</div>
								<div class="form-group">
									{!!Form::label('address','Address:')!!}
									{!!Form::text('address',null,['class'=>'form-control','placeholder'=>'Address'])!!}
								</div>
								<div class="form-group">
									{!!Form::label('city','City:')!!}
									{!!Form::text('city',null,['class'=>'form-control','placeholder'=>'City'])!!}
								</div>
								<div class="form-group">
									{!!Form::label('state','State:')!!}
									{!!Form::text('state',null,['class'=>'form-control','placeholder'=>'State'])!!}
								</div>
								<div class="form-group">
									{!!Form::label('zip','Zip Code:')!!}
									{!!Form::text('zip',null,['class'=>'form-control','placeholder'=>'Zip Code'])!!}
								</div>
								<div class="form-group">
									{!!Form::label('country','Country:')!!}
									{!!Form::text('country',null,['class'=>'form-control','placeholder'=>'Country'])!!}
								</div>
								<div class="form-group">
									{!!Form::label('phone','Telephone:')!!}
									{!!Form::text('phone',null,['class'=>'form-control','placeholder'=>'Telephone'])!!}
								</div>
								{!!Form::submit('Update Info',['class'=>'btn btn-primary'])!!}
						
								{!! Form::close() !!}
						</div>
					</div>						
				</div>
			</div>
			
		</div>

	</section> <!--/#cart_items-->


@endsection