@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Shipping </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->

<section id="cart_items">
    <div class="container">
    <br><br>
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
        <h2 class="heading"></h2>
      </div>  

          <div class="col-sm-8">
            <div class="contact-form">

                  <form action="{{ route('shippingupdate', $shipping->id) }}" id="upd-form-user" class="contact-form row" name="upd-form-user" method="post">
                    <div class="form-group col-md-12">
                      <label for="address">Name:</label>
                      <input type="text" id="name"  name="name" class="form-control" value="{{ $shipping['name'] }}"> 
                    </div>

                    <div class="form-group col-md-6">
                      <label for="address">Range Value Min:  $</label>
                      <input type="number" id="range_value_min" name="range_value_min" class="form-control" value="{{ $shipping['range_value_min'] }}"> 
                    </div>                    
                    <div class="form-group col-md-6">
                      <label for="address">Range Value Max:  $</label>
                      <input type="number" id="range_value_max" name="range_value_max" class="form-control" value="{{ $shipping['range_value_max'] }}"
> 
                    </div>

                    <div class="form-group col-md-6">
                      <label for="address">Shipping Mode Ground  $:</label>
                      <input type="number" id="ground" name="ground" class="form-control" value="{{ $shipping['ground'] }}"> 
                      
                    </div>

                    <div class="form-group col-md-6">
                      <label for="address">Shipping Mode Second Day  $:</label>
                      <input type="number" id="second_day" name="second_day" class="form-control" value="{{ $shipping['second_day'] }}"> 
                    </div>

                    <div class="form-group col-md-6">
                      <label for="address">Shipping Mode Next Day  $:</label>
                      <input type="number" id="next_day" name="next_day" class="form-control" value="{{ $shipping['next_day'] }}"> 
                    </div>
                                                          
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success">Update Info</button>       
                    </div>       
                  {{ csrf_field() }}                                                           
                </form>
            </div>
          </div>
    
      
    </div>

  </section> <!--/#cart_items-->          <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
