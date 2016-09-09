@extends('admin.index')

@section('content')

<div id="page-wrapper" >

 
            <div id="page-inner">
                  @if(Session::has('message'))
                      <div class="alert alert-success">
                          {{ Session::get('message') }}
                      </div>
                  @endif 
                  <div class="row">
                    <div class="col-md-12">
                      <h2>List Products </h2>  
                      <fieldset class="fsStyle">
                        <legend class="legendStyle">
                        <a data-toggle="collapse" data-target="#demo" href="#">Filter by </a>
                        </legend>
                        <div class="row collapse in" id="demo">

                          <div class="col-md-4">
                            <div class="form-group">
                            <label for="card-number">Category</label>
                            <select id="categories_id" name="categories_id">
                              <option value="0">All Categories</option>
                              @foreach($categories1 as $category)                     
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                              @endforeach
                            </select>                
                            </div>              
                          </div>  

                          <div class="col-md-4">
                            <div class="form-group">
                            <label for="card-number">Brand</label>
                            <select id="brand_id" name="brand_id">
                              <option value="0">All Brands</option>
                              @foreach($brands1 as $brand)              
                                <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                              @endforeach
                            </select>                
                            </div>              
                          </div> 
                          <a class="btn btn-success" href="{{ route('product.create') }}">Filter</a>
                        </div>
                      </fieldset>
                    </div> 
                  </div>
                           
                 <!-- /. ROW  -->
                  

  <section id="cart_items">
  


    <div class="col-md-12">
<hr>
      <div class="table-responsive cart_info">

        <table class="table table-condensed" id="products">
          <thead>
            <tr class="cart_menu">
              <td class="image" colspan="11">
                <label for="card-number">Bulks Actions</label>
                <select id="bulks_id" name="bulks_id">
                  <option value="1">Edit Products</option>
                  <option value="2">Delete Products</option>
                </select>    
              <a class="btn btn-success" href="{{ route('product.create') }}">Apply</a>             
              </td>
            </tr>
            <tr class="cart_menu">
              <td class="image"><input type="checkbox" id="" name=""></td>
              <td class="image">Image</td>
              <td class="description">Name</td>
              <td class="quantity">Sku</td>
              <td class="quantity">Price</td>
              <td class="quantity">Stock</td>
              <td class="quantity">Brand</td>
              <td class="quantity">Category</td>            
              <td class="quantity">Status</td>
              <td class="quantity">Edit</td>
              <td class="total">Delete</td>
            </tr>

          </thead>
          <tbody>
         {!! $tree !!}      
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="price"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="price"></td>                            
              <td class="price"></td>
              <td class="quantity"><a class="btn btn-success" href="{{ route('product.create') }}">Create New Product</a></td>
              <td class="total"></td>
            </tr>            
          </tfoot>
        </table>

      </div>
      {{ $products->links() }}




    </div>


  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

@endsection
