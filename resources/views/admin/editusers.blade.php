@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Banner </h2>   
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
        <h2 class="heading">User Account</h2>
      </div>  

          <div class="col-sm-8">
            <div class="contact-form">

              <form action="{{ route('userupdate', $user->id) }}" id="upd-form-user" class="contact-form row" name="upd-form-user" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                      <label for="address">Email:</label>
                      <input type="text" id="email" class="form-control" placeholder="{{ $user['email'] }}" readonly> 
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Name:</label>
                    @if($user['name'] != '')
                      <input type="text" id="name" class="form-control" name="name" placeholder="{{ $user['name'] }}">
                    @else
                      <input type="text" id="name" class="form-control" name="name" placeholder="Full Name">
                    @endif
                        
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Password:</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password : Leave Blank if Don't Want to Change">
                    </div><br>
          <div class="bill-to col-md-12">
            <p>Bill To</p>
          </div>
                    <div class="form-group col-md-6">
                      <label for="address">Address:</label>
                        <input type="text" id="address" class="form-control" name="address" placeholder="{{ $user['address'] }}"">
                    </div>
                    <div class="form-group col-md-6">
            <label for="city">City:</label>                    
                        <input type="text" id="city" class="form-control" name="city" placeholder="{{ $user['city'] }}">                      
                    </div>
                    <div class="form-group col-md-6">
                        <label for="state">State:</label>
                    <input type="text" id="state" class="form-control" name="state" placeholder="{{ $user['state'] }}">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="zip">Zip Code:</label>
                    <input type="text" id="zip" class="form-control" name="zip" placeholder="{{ $user['zip'] }}">             
                    </div>
                    <div class="form-group col-md-6">
                    <label for="country">Country:</label>
                    <input type="text" id="country" class="form-control" name="country" placeholder="{{ $user['country'] }}">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="phone">Telephone:</label>
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="{{ $user['phone'] }}">       
                    </div>
                     <div class="form-group col-md-12">
                        <label for="phone">Current -  Sales Tax*:</label>   <br>
                                @if( $user['salestax'] != "")
                                      <label for="phone">-- {{ $user['salestax'] }} </label>                               
                                @else
                                      <label for="phone"><i>-- No File</i></label>                                
                                @endif
                                <br>                     
                        <label><input type="checkbox" id="cbox1" name="cbox1" value="1"></label>
                        <label for="card-name">Check If Want To Change Current Sales Tax File </label><br>
                        <label for="phone">Upload - Resale Certificate for Sales Tax copy*:</label>
                        <input type="file" id="salestax" class="form-control" name="salestax">        
                    </div> 
                    <div class="form-group col-md-6">
                    <label for="phone">Status:</label>
                    <select id="status" name="status">
                    @if($user['status'] == '0'))
                      <option selected="selected" value="0">Inactive</option>
                      <option value="1">Active</option>
                    @else
                      <option value="0">Inactive</option>
                      <option selected="selected" value="1">Active</option>
                    @endif
                    </select>           
                    </div>  
                    <div class="form-group col-md-6">
                    <label for="phone">Role:</label>
                    <select id="role" name="role">
                    @if($user['role'] == '1'))
                      <option selected="selected" value="1">Costumer</option>
                      <option value="2">Administrator</option>
                    @else
                      <option value="1">Costumer</option>
                      <option selected="selected" value="2">Administrator</option>
                    @endif
                    </select>           
                    </div>                                                                             
                    <div class="form-group col-md-6"></div>
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
