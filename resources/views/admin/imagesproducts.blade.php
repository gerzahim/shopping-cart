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
                     <h2>Gallery Images by Id Product: {{ $id }}</h2>   
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
              <td class="image">Image</td>
              <td class="quantity">Edit</td>
              <td class="quantity">Delete</td>
            </tr>
          </thead>
          <tbody>
          @foreach($imgproducts as $imgproduct)
            <tr class="cart_menu">
              <td class="cart_product">
                @if( file_exists(URL::to('/media/')).$imgproduct->imagepath1)
                  <img height="50px" width="50px" src="{{ URL::to('media/') }}/{{ $imgproduct->imagepath1}}" alt=""> 
                @else
                  <img height="50px" width="50px" src="{{ URL::to('/images/') }}/no-image.jpg" alt="" />
                @endif  
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{ URL::to('/imagesedit/') }}/{{ $imgproduct['id'] }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{ URL::to('/imagesdelete/') }}/{{ $imgproduct['id'] }}"><i class="fa fa-times" aria-hidden="true"></i></a>
              </td>
            </tr>
          @endforeach 
   
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="price"></td>
              <td class="price">
                <a class="btn btn-success" href="{{ route('addimagegallery', ['id' => $id]) }}">Add Image Gallery</a>
              </td>
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
