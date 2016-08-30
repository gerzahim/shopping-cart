@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Brand </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="{{ route('brands.update', ['id' => $brand['id']]) }}" method="post" id="edit-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Name Brand</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ $brand['name'] }}" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name">Image Brand Current</label>
                
                @if($brand['imagepath'] == '')
                  <img height="50px" width="50px" src="{{ URL::to('/') }}/images/no-image.jpg" alt="No Images">
                @else
                  <img height="50px" width="50px" src="{{ URL::to('/') }}/media/{{ $brand['imagepath'] }}" alt="No Images">
                @endif
                <br><br>
                <label><input type="checkbox" id="cbox1" name="cbox1" value="1"></label>
                <label for="card-name">Check If Want To Change Current Image Brand</label>
                <input type="file" id="imagepath" name="imagepath" accept="image/*">
              </div>              
            </div>            
          </div>     
          {{ method_field('PUT') }}
          {{ csrf_field() }}          
          <button type="submit" class="btn btn-success">Update Brand</button>
        </form>
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
