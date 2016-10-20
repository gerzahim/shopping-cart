@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Image </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->

  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="{{ route('imagesupdategallery', ['id' => $imgproduct['id']]) }}" method="post" id="edit-form" enctype="multipart/form-data">
        <input type="hidden" id="sku" name="sku" value="{{ $sku }}">
        <input type="hidden" id="product_id" name="product_id" value="{{ $product_id }}">
          <div class="row"  id="fff">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name" name="imagepath_price"><h3><span>Image Gallery (width=300px ; Height=300px)</span></h3></label> 
                <br>               
                  @if( file_exists(URL::to('/media/')).$imgproduct['imagepath1'])
                    <img height="300px" width="300px" src="{{ URL::to('media/') }}/{{ $imgproduct['imagepath1'] }}" alt=""> 
                  @else
                    <img height="300px" width="300px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" />
                  @endif                   
                <br><br>
                <label><input type="checkbox" id="cbox2" name="cbox2" value="1"></label>
                <label for="card-name" name="cbox2">If Want To Change Current Image Gallery</label>
                <input type="file" id="imagepath1" name="imagepath1" accept="image/*">
              </div>              
            </div>            
          </div>
          <hr>                
          {{ csrf_field() }}          
          <button type="submit" class="btn btn-success">Update Image Gallery</button>
        </form>
            <br>
          <br>
          <a class="cart_quantity_delete" href="{{ URL::to('/editgallery/') }}/{{ $product_id }}"><button class="btn btn-warning"> Back List Images Gallery</button></a>
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
