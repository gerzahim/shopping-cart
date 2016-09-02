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
      <hr>
      <div class="table-responsive cart_info">
        <form action="{{ route('banners.update', ['id' => $banner['id']]) }}" method="post" id="edit-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Text Red</label>
                <input type="text" id="name" class="form-control" name="text_red" value="{{ $banner['text_red'] }}" >
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Tex Gray</label>
                <input type="text" id="name" class="form-control" name="text_gray" value="{{ $banner['text_gray'] }}" >
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Title</label>
                <input type="text" id="name" class="form-control" name="title" value="{{ $banner['title'] }}" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Description</label>
                <input type="text" id="name" class="form-control" name="description" value="{{ $banner['description'] }}" required>
              </div>              
            </div>            
          </div> 
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Button</label>
                <input type="text" id="name" class="form-control" name="button" value="{{ $banner['button'] }}" required>
              </div>              
            </div>            
          </div>                     
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name">Image Banner Current</label>                
                  @if($banner['imagepath'] == '')
                    <img height="50px" width="50px" src="{{ URL::to('/') }}/images/no-image.jpg" alt="No Images">
                  @else
                    <img height="50px" width="50px" src="{{ URL::to('/') }}/media/{{ $banner['imagepath'] }}" alt="No Images">
                  @endif
                <br><br>
                <label><input type="checkbox" id="cbox1" name="cbox1" value="1"></label>
                <label for="card-name">Check If Want To Change Current Image Banner</label>
                <input type="file" id="imagepath" name="imagepath" accept="image/*">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name">Image Price Current</label>                
                  @if($banner['imagepath_price'] == '')
                    <img height="50px" width="50px" src="{{ URL::to('/') }}/images/no-image.jpg" alt="No Images">
                  @else
                    <img height="50px" width="50px" src="{{ URL::to('/') }}/media/{{ $banner['imagepath_price'] }}" alt="No Images">
                  @endif
                <br><br>
                <label><input type="checkbox" id="cbox2" name="cbox2" value="1"></label>
                <label for="card-name">If Want To Change Current Image Banner</label>
                <input type="file" id="imagepath_price" name="imagepath_price" accept="image/*">
              </div>              
            </div>            
          </div>                
          {{ method_field('PUT') }}
          {{ csrf_field() }}          
          <button type="submit" class="btn btn-success">Update Banner</button>
        </form>
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
