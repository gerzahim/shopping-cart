@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Create a New Product </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="{{ route('product.store') }}" method="post" id="create-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="title" class="form-control" required name="title">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="address">Description</label>
                <textarea id="description" class="form-control" name="description" rows="4" cols="50"></textarea>
              </div>              
            </div>            
          </div>           
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Sku</label>
                <input type="text" id="sku" class="form-control" required name="sku">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Price</label>
                <input type="text" id="price" class="form-control" required name="price">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Stock</label>
                <input type="text" id="quantity" class="form-control" required name="quantity">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-number">Category</label>
                  <select id="categories_id" name="categories_id">
                    @foreach($categories as $category)
                      <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
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
                      <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                    @endforeach
                  </select>                
              </div>              
            </div>            
          </div> 
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name">Image Products</label>
                <input type="file" id="imagepath" name="imagepath" accept="image/*">
              </div>              
            </div>            
          </div>             
 
          {{ csrf_field() }}
          <button type="submit" class="btn btn-success">Create New Product</button>
        </form>
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
