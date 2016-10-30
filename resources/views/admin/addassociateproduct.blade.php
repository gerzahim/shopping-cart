@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Attribute: </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="{{ route('associateproduct.store', ['id' => $id]) }}" method="post" id="create-form" enctype="multipart/form-data">
        <input type="hidden" id="associates_attributes_id" name="associates_attributes_id" value="{{$id}}">
            <div class="form-group">
              <label for="card-number">List Product with Attributes: </label>
                <select id="product_attributes_values_id" name="product_attributes_values_id">

                  @foreach($assoproducts as $assoproduct)
                      <option value="{{ $assoproduct['id'] }}">

                      {{ substr($titleproduct[$assoproduct['product_id']], 0, 15) }} / 
                      {{ $skuproduct[$assoproduct['product_id']]}} /
                      {{ $listattributesv[$assoproduct['attributes_values_id']] }}</option>
                  @endforeach
                </select>                
            </div> 
          </div>
          {{ csrf_field() }}
          <button type="submit" class="btn btn-success">Associate this Products</button>
          &nbsp;
          <a class="btn btn-warning" href="{{ URL::route('associates.edit', $id) }}"> Back </a>
        </form>
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
