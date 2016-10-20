@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Category </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">
    <div class="container">
      <hr>
      <div class="table-responsive cart_info">
        <form action="{{ route('categories.update', ['id' => $category['id']]) }}" method="post" id="edit-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="name">Name Category</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ $category['name'] }}" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="address">Description</label>
                <input type="text" id="description" class="form-control" name="description" value="{{ $category['description'] }}">
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-name">Image Category Current</label>
                
                @if($category['imagepath'] == '')
                  <img height="50px" width="50px" src="{{ URL::to('/') }}/images/no-image.jpg" alt="No Images">
                @else
                  <img height="50px" width="50px" src="{{ URL::to('/') }}/media/{{ $category['imagepath'] }}" alt="No Images">
                @endif
                <br><br>
                <label><input type="checkbox" id="cbox1" name="cbox1" value="1"></label>
                <label for="card-name">Check If Want To Change Current Image Category</label>
                <input type="file" id="imagepath" name="imagepath" accept="image/*">
              </div>              
            </div>            
          </div>    
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-number">Parent Category</label>
                  <select id="parent_id" name="parent_id">
                      <option value="NULL">No Parent</option>
                    @foreach($categories as $categoryy)                      
                      {{-- <!-- Don't Show itself category --> --}}
                      @if(!($category['id'] == $categoryy['id']))
                        {{-- <!-- Mark Select if it's the same one --> --}}
                        @if($category['parent_id'] == $categoryy['id'])
                          <option selected="selected" value="{{ $categoryy['id'] }}">{{ $categoryy['name'] }}</option>
                        @else
                          <option value="{{ $categoryy['id'] }}">{{ $categoryy['name'] }}</option>
                        @endif

                      @endif  

                    @endforeach
                  </select>                
              </div>              
            </div>            
          </div> 
 
          {{ method_field('PUT') }}
          {{ csrf_field() }}          
          <button type="submit" class="btn btn-success">Update Category</button>
        </form>
      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
