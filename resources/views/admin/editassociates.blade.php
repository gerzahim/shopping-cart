@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Associate </h2>   
                    </div>
                </div> 
      <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif
      @endforeach
    </div>               
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="{{ route('associates.update', ['id' => $assoattribute['id']]) }}" method="post" id="create-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Name Attribute</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ $assoattribute['name'] }}" required>
              </div>              
            </div>                      
          </div>
            <div class="form-group">
              <label for="card-number">Associate by: </label>
                <select id="attributes_id" name="attributes_id">

                  @foreach($attributes as $attribute) 
                      @if($attribute->id == $assoattribute['attributes_id'])
                        <option selected="selected" value="{{ $attribute['id'] }}">{{ $attribute['name'] }}</option>
                      @else
                        <option value="{{ $attribute['id'] }}">{{ $attribute['name'] }}</option>
                      @endif                                   
                  @endforeach

                </select>                
            </div>           
          {{ method_field('PUT') }}
          {{ csrf_field() }}          
          <button type="submit" class="btn btn-success">Update Associate</button>

        </form>
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->      

<div class="row">
    <div class="col-md-12">
     <h2>List Products Associates  </h2>   
    </div>
</div>


  <section id="cart_items">
    <div class="container">
      <div class="table-responsive cart_info">
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Value ID</td>
              <td class="description">Name</td>
              <td class="total">Delete</td>
            </tr>
          </thead>
          <tbody>

            @foreach( $AssociatesProducts as $AssociatesProduct)



              <tr>
                <td align="center">{{ $AssociatesProduct->id }}</td>
                <td align="left"><b>
                {{-- 
                {{ $AssociatesProduct->products_attributes_id }}--}}
                {{ substr($titleproduct[$listassoproducts_pid[$AssociatesProduct->products_attributes_id]], 0, 15) }} / 
                {{ $skuproduct[$listassoproducts_pid[$AssociatesProduct->products_attributes_id]]}} / {{ $listattributesv[$listassoproducts_aid[$AssociatesProduct->products_attributes_id]] }}
                </b></td>
                <td class="cart_delete">
                  <a class="cart_quantity_delete" href="{{ URL::route('associateproduct.destroy', [$AssociatesProduct['id'],$assoattribute['id']]) }}"><i class="fa fa-times" aria-hidden="true"></i></a>
                </td>              
              </tr>               
            @endforeach
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="price"></td>
              <td class="quantity">
                <a class="btn btn-success" href="{{ URL::route('associateproduct.create', $associate_id) }}">Add Product </a>
                &nbsp;
                <a class="btn btn-warning" href="{{ URL::route('associates.index') }}"> Back </a>
              </td>
              <td class="total"></td>
              <td class="total"></td>
            </tr>            
          </tfoot>
        </table>
      </div>
    </div>
  </section> <!--/#cart_items-->   

</div>
<!-- /. PAGE INNER  -->





</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
