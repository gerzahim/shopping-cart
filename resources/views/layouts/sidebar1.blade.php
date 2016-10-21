@section('sidebar')
<!-- BEGIN SIDEBAR -->

<div class="left-sidebar">
    <!--category-products-->
    <h2>Categories</h2>
          {!! $tree !!} 
    <div class="panel-group category-products" id="accordian">              
                     
    </div>
    <!--/category-products-->

    <div class="brands_products"><!--brands_products-->
      <h2>Brands</h2>
      <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
          {!! $tree1 !!}   
        </ul>
      </div>
    </div><!--/brands_products-->

    <!--/Banner Poster-->
    <div class="shipping text-center"><!--shipping-->
    {{-- 
      <img height="329px" width="270px" src="{{ URL::to('media/poster.jpg') }}""  />
    --}}
    <img  width="300px" src="{{ URL::to('media/') }}/{{$setting->bansidepath}}" alt="" />
    </div><!--/shipping-->
    <!--/Banner Poster-->

</div>
<br>
</div>

        <!-- END sidebar -->    
@endsection 


