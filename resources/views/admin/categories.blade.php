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
                     <h2>List Categories </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  

  <section id="cart_items">
  


    <div class="col-md-12">
<hr>
      <div class="table-responsive cart_info">

       


        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Imagen</td>
              <td class="image">Category ID</td>
              <td class="description">Name</td>
              <td class="price">Description</td>
              <td class="price">Parent Category</td>
              <td class="quantity">Edit</td>
              <td class="total">Delete</td>
            </tr>
          </thead>
          <tbody>
         {!! $tree !!}

          {{-- 
            @foreach($categories as $category)
            <tr>
              <td class="cart_product">
                <img height="50px" width="50px" src="media/{{ $category['imagepath'] }}" alt="No Images">
              </td>
              <td class="cart_description">
                <h4><a href="">{{ $category['id'] }}</a></h4>
              </td>
              <td class="cart_description">
                <h4><a href="">{{ $category['name'] }}</a></h4>
              </td>
              <td class="cart_price">
                <p>{{ $category['description'] }}</p>
              </td>

              <td class="cart_price">
                <p>{{ $category['parentcategory'] }}</p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{ route('product.removeItem', ['id' => $category['id']]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{ route('product.removeItem', ['id' => $category['id']]) }}"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            @endforeach  
            --}}        
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="image"></td>
              <td class="description"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="quantity"><a class="btn btn-success" href="{{ route('categories.create') }}">Create Category</a></td>
              <td class="total"></td>
              <td class="total"></td>
            </tr>            
          </tfoot>
        </table>

      </div>





    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

@endsection
