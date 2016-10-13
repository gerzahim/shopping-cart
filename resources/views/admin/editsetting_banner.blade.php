@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Settings </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->

  <section id="cart_items">
    <div class="container">

      <div class="row">
        <div class="col-xs-10">
          <hr> 
        </div>
      </div>

      <div class="table-responsive cart_info">
        <form action="{{ route('settings.updatebanner', ['id' => $setting['id']]) }}" method="post" id="edit-form" enctype="multipart/form-data">

                            
          <div class="row">
            <div class="form-group col-md-12">
              <div class="form-group">
                <label for="card-name" id="msgtxtimg" name="msgtxtimg">Image Logo Home Current 
                </label>
                <br>                 
                <img width="300px" src="{{ URL::to('/') }}/media/{{ $setting['bansidepath'] }}" alt="No Images" name="imagepath">
                <br><br> 
                <label><input type="checkbox" id="cbox1" name="cbox1" value="1"></label>

                <label for="card-name">Check If Want To Change Current Image Logo Home</label>
                <br>
                <label for="name" id="text_redl" name="text_red">#suggest (width=300px )</label>
                <input type="file" id="bansidepath" name="bansidepath" accept="image/*">
              </div>              
            </div>           
          </div>
                       



          {{ csrf_field() }}
          <br>          
          <button type="submit" class="btn btn-success">Update Banner</button>
        </form>

      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
