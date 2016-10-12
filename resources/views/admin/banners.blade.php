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
                     <h2>List Banners Carrousel</h2>   
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
              <td class="image">Imagen Banner</td>
              <td class="quantity">Title</td>       
              <td class="quantity">Type</td>
              <td class="quantity">Edit</td>
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
              <td class="total"></td>
            </tr>            
          </tfoot>
        </table>

      </div>





    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                     <h2>Banner Left Sidebar</h2>   
                    </div>

  <section id="cart_items">

    <div class="col-md-12">
<hr>
      <div class="table-responsive cart_info">

<table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Imagen Banner</td>
              <td class="quantity">Edit</td>
            </tr>
          </thead>
          <tbody>
            <tr class="cart_menu">
              <td class="image"><img  width="100px" src="{{ URL::to('media/') }}/{{$setting->bansidepath}}" alt="" /></td>
              <td class="quantity">
                <a href="{{ URL::to('selectByCategory') }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
              </td>
            </tr>  
          </tbody>
        </table>

      </div>





    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->                    
                              
                </div>  


                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

@endsection
