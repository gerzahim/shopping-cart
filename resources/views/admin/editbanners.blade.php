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
                  
                        @if($banner['typeofbanner'] == '0')
                          <option selected="selected" value="0">Text and Image</option>
                          <option value="1">Large Image</option>
                        @else                  
                          <option value="0">Text and Image</option>
                          <option selected="selected" value="1">Large Image</option>
                        @endif

                  </select>                
              </div>              
            </div>            
          </div> 

          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Text Red</label>
                <input type="text" id="text_red" class="form-control" name="text_red" value="{{ $banner['text_red'] }}" >
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name" id="text_grayl" name="text_gray">Tex Gray</label>
                <input type="text" id="text_gray" class="form-control" name="text_gray" value="{{ $banner['text_gray'] }}" >
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name" id="titlel" name="title">Title</label>
                <input type="text" id="title" class="form-control" name="title" value="{{ $banner['title'] }}" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name" id="descriptionl" name="description">Description</label>
                <textarea id="description" class="form-control" name="description" rows="3" cols="50" required>{{ $banner['description'] }}</textarea>
              </div>              
            </div>            
          </div> 
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name" id="buttonl" name="button">Button</label>
                <input type="text" id="button" class="form-control" name="button" value="{{ $banner['button'] }}" required>
              </div>              
            </div>    
          </div> 
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name" id="linkl">Link</label>
                <input type="text" id="link" class="form-control" name="link" value="{{ $banner['link'] }}" placeholder="http://yourwebsite.com/categories">
              </div>              
            </div>            
          </div>  
          <hr>                              
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name" id="msgtxtimg" name="msgtxtimg"><h3><span>Image Banner Current (width=280px ; Height=280px)</span></h3>
                  <br> 
                  <a href="{{ URL::to('media/banner/template_bannershort.psd') }}">Download PSD Template</a>
                  <br>
                </label>                
                <label for="card-name" id="msglargimg" name="msglargimg" style="display:none"><h3><span>Image Large Banner Current (width=920px ; Height=350px)</span></h3>
                  <br> 
                  <a href="{{ URL::to('media/banner/template_bannerlarge.psd') }}">Download PSD Template</a>
                  <br>
                </label>
                  @if($banner['imagepath'] == '')
                    <img height="50px" width="50px" src="{{ URL::to('/') }}/images/no-image.jpg" alt="No Images" name="imagepath">
                  @else
                    @if($banner['typeofbanner'] == '1')

                      <img height="50px" width="100px" src="{{ URL::to('/') }}/media/{{ $banner['imagepath'] }}" alt="No Images" name="imagepath">
                    @else
                      <img height="50px" width="50px" src="{{ URL::to('/') }}/media/{{ $banner['imagepath'] }}" alt="No Images" name="imagepath">
                    @endif
                  @endif
                <br><br>
                <input type="file" id="imagepath" name="imagepath" accept="image/*">
                <label><input type="checkbox" id="cbox1" name="cbox1" value="1"></label>
                <label for="card-name">Check If Want To Change Current Image Banner</label>                
              </div>              
            </div>            
          </div>
          <hr>
          <div class="row"  id="fff">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name" name="imagepath_price"><h3><span>Image Price Current .PNG (width=50px ; Height=50px)</span></h3></label>                
                  @if($banner['imagepath_price'] == '')
                    <img height="50px" width="50px" src="{{ URL::to('/') }}/images/no-image.jpg" alt="No Images" name="imagepath_price">
                  @else
                    <img height="50px" width="50px" src="{{ URL::to('/') }}/media/{{ $banner['imagepath_price'] }}" alt="No Images" name="imagepath_price" >
                  @endif
                <br><br>
                <input type="file" id="imagepath_price" name="imagepath_price" accept="image/*">
                <label><input type="checkbox" id="cbox2" name="cbox2" value="1"></label>
                <label for="card-name" name="cbox2">If Want To Change Current Image Banner</label>
              </div>              
            </div>            
          </div>
          <hr>                
          {{ method_field('PUT') }}
          {{ csrf_field() }}          
          <button type="submit" class="btn btn-success">Update Banner</button>
        </form>

        @if($banner['typeofbanner'] == '1')
          <script type="text/javascript">
              document.getElementById('text_redl').style.display = 'none';
              document.getElementById('text_red').style.display = 'none';
              document.getElementById('text_grayl').style.display = 'none';
              document.getElementById('text_gray').style.display = 'none';                      
              document.getElementById('titlel').style.display = 'none';
              document.getElementById('title').style.display = 'none';
              document.getElementById('descriptionl').style.display = 'none';
              document.getElementById('description').style.display = 'none';
              document.getElementById('buttonl').style.display = 'none';
              document.getElementById('button').style.display = 'none';
              document.getElementById('msgtxtimg').style.display = 'none';
              document.getElementById('msglargimg').style.display = 'block';
              document.getElementById('fff').style.display = 'none';
          </script>
        @endif

      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
