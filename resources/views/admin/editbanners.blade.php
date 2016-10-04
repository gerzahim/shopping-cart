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
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-number">Select Type of Banner</label>

                  <select id="typeofbanner" name="typeofbanner">
                    <option value="0">Text and Image</option>
                    <option value="1">Large Image</option>                    

                    {{-- <!--
                    @foreach($categories as $category)                     
                        
                        @if($product['categories_id'] == $category['id'])
                          <option selected="selected" value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @else
                          <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endif            

                    @endforeach
                    --> --}}
                  </select>                
              </div>              
            </div>            
          </div> 

          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name" name="text_red">Text Red</label>
                <input type="text" id="text_red" class="form-control" name="text_red" value="{{ $banner['text_red'] }}" >
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name" name="text_gray">Tex Gray</label>
                <input type="text" id="name" class="form-control" name="text_gray" value="{{ $banner['text_gray'] }}" >
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name" name="title">Title</label>
                <input type="text" id="name" class="form-control" name="title" value="{{ $banner['title'] }}" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name" name="description">Description</label>
                <textarea id="description" class="form-control" name="description" rows="3" cols="50" required>{{ $banner['description'] }}</textarea>
              </div>              
            </div>            
          </div> 
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name" name="button">Button</label>
                <input type="text" id="name" class="form-control" name="button" value="{{ $banner['button'] }}" required>
              </div>              
            </div>    
          </div> 
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Link</label>
                <input type="text" id="link" class="form-control" name="link" value="{{ $banner['link'] }}" placeholder="http://yourwebsite.com/categories">
              </div>              
            </div>            
          </div>                                
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name" name="msgtxtimg">Image Banner Current</label>                
                <label for="card-name" name="msglargimg" style="display:none">Image Large Banner Current  </label>
                  @if($banner['imagepath'] == '')
                    <img height="50px" width="50px" src="{{ URL::to('/') }}/images/no-image.jpg" alt="No Images" name="imagepath">
                  @else
                    <img height="50px" width="50px" src="{{ URL::to('/') }}/media/{{ $banner['imagepath'] }}" alt="No Images" name="imagepath">
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
                <label for="card-name" name="imagepath_price">Image Price Current</label>                
                  @if($banner['imagepath_price'] == '')
                    <img height="50px" width="50px" src="{{ URL::to('/') }}/images/no-image.jpg" alt="No Images" name="imagepath_price">
                  @else
                    <img height="50px" width="50px" src="{{ URL::to('/') }}/media/{{ $banner['imagepath_price'] }}" alt="No Images" name="imagepath_price" >
                  @endif
                <br><br>
                <label><input type="checkbox" id="cbox2" name="cbox2" value="1"></label>
                <label for="card-name" name="cbox2">If Want To Change Current Image Banner</label>
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
