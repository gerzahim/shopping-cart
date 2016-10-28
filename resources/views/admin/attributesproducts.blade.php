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
                     <h2>Attribute by Id Product: {{ $id }}</h2>   
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
              <td class="image">Attribute</td>
              <td class="image">Value</td>
              <td class="quantity">Delete</td>
            </tr>
          </thead>
          <tbody>
          @foreach($attributesproducts as $attributesproduct)
            <tr class="cart_menu">
              <td class="cart_product">
                  {{ $attributeName[$attributeId[$attributesproduct->attributes_values_id]] }}
              </td>            
              <td class="cart_product">
                  {{ $attributesproduct['att_value'] }}
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{ URL::to('/imagesdelete/') }}/{{ $attributesproduct['id'] }}"><i class="fa fa-times" aria-hidden="true"></i></a>
              </td>
            </tr>
          @endforeach 
   
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="price"></td>
              <td class="price">
                <a class="btn btn-success" href="{{ route('selecattributeproduct', ['id' => $id]) }}">Add Attribute</a>
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
