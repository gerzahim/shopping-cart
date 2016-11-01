@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Add CSV File </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
  <section id="cart_items">

    <div class="container">

    @if(Session::has('message'))
      <div class="alert alert-success">
          {{ Session::get('message') }}
      </div>
    @endif 
    <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif
      @endforeach
    </div>      
    
    @if($file_found == true)
      <p>File is Upload ! 
      <a href="{{ URL::to('/import-csvCat') }}"><button class="btn btn-success">Import CSV FILE</button></a>  
      </p> 
      <br><br><br><br>
      <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('upload-csvCat') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
        <br>
        <button class="btn btn-warning">Replace CSV File</button>
                  {{ csrf_field() }}   
      </form>
    @else  
      <a href="{{ URL::to('import/samplecategories.csv') }}"><button class="btn btn-primary">Download CSV Categories Sample</button></a><br><br>
      <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('upload-csvCat') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
        <br>
        <button class="btn btn-warning">Upload CSV File</button>
                  {{ csrf_field() }}   
      </form>
    @endif


  </div>




  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
