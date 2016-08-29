@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Product </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="{{ route('product.update', ['id' => $product['id']]) }}" method="post" id="edit-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="title" class="form-control" required name="title" placeholder="{{ $product['title'] }}">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="address">Description</label>
                <textarea id="description" class="form-control" name="description" rows="4" cols="50">{{ $product['description'] }}</textarea>
              </div>              
            </div>            
          </div>           
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Sku</label>
                <input type="text" id="sku" class="form-control" required name="sku" placeholder="{{ $product['sku'] }}">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Price</label>
                <input type="text" id="price" class="form-control" required name="price" placeholder="{{ $product['price'] }}">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Stock</label>
                <input type="text" id="quantity" class="form-control" required name="quantity" placeholder="{{ $product['quantity'] }}">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-number">Category</label>
                  <select id="categories_id" name="categories_id">
                    @foreach($categories as $category)                     
                        {{-- <!-- Mark Select if it's the same one -->   --}}
                        @if($product['categories_id'] == $category['id'])
                          <option selected="selected" value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @else
                          <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endif            

                    @endforeach
                  </select>                
              </div>              
            </div>            
          </div> 
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-number">Brand</label>
                  <select id="brand_id" name="brand_id">
                    @foreach($brands as $brand)              
                       
                        {{-- <!-- Mark Select if it's the same one --> --}}
                        @if($product['brand_id'] == $brand['id'])
                          <option selected="selected" value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                        @else
                          <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                        @endif

                    @endforeach
                  </select>                
              </div>              
            </div>            
          </div>           
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name">Current Product Image</label>
                
                @if($product['imagepath'] == '')
                  <img height="300px" width="300px" src="{{ URL::to('/') }}/images/no-image.jpg" alt="No Images">
                @else
                  <img height="300px" width="300px" src="{{ URL::to('/') }}/media/{{ $product['imagepath'] }}" alt="No Images">
                @endif
                <br><br>
                <label for="card-name">If Want To Change Current Image Product</label>
                <input type="file" id="imagepath" name="imagepath" accept="image/*">
              </div>              
            </div>            
          </div>                         

          {{ method_field('PUT') }}
          {{ csrf_field() }}   
          <button type="submit" class="btn btn-success">Update Product</button>
        </form>
      </div>

    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
