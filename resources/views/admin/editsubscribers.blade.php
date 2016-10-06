@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Subscribers </h2>   
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
            <form action="{{ route('subscribers.update', ['id' => $subscribers['id']]) }}" method="post" id="edit-form" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                      <label for="address">Email:</label>
                      <input type="text" id="email" class="form-control" placeholder="{{ $subscribers['email'] }}" readonly> 
                    </div>

                    <br>
                    <div class="form-group col-md-6">
                    <label for="phone">Status:</label>
                    <select id="status" name="status">
                    @if($subscribers['status'] == '0'))
                      <option selected="selected" value="0">Inactive</option>
                      <option value="1">Active</option>
                    @else
                      <option value="0">Inactive</option>
                      <option selected="selected" value="1">Active</option>
                    @endif
                </select>           
                    </div>                                                           
                    <div class="form-group col-md-6"></div>
                    <div class="form-group col-md-6"></div>       
                  {{ method_field('PUT') }}
                  {{ csrf_field() }}          
                  <button type="submit" class="btn btn-success">Update Info</button>                                                     
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
