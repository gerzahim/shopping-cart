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

            @foreach($categories as $category)
            <tr>
              <td class="cart_product">
              
                @if($category['imagepath'] != null)
                  <img height="50px" width="50px" src="media/{{ $category['imagepath'] }}" alt="No Images">
                @else
                  <img height="50px" width="50px" src="images/no-image.jpg" alt="No Images">
                @endif
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
                <p>{{ $category['parent_id'] }}</p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{ route('product.removeItem', ['id' => $category['id']]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{ route('product.removeItem', ['id' => $category['id']]) }}"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            @endforeach  







   {{--        
       <ul>
  @foreach ($categories as $parent)
    <li>{{ $parent->name }}
      @if ($parent->children->count())
        <ul>
          @foreach ($parent->children as $child)
            <li>{{ $child->name }}</li>
              @if ($child->children->count())
                <ul>
                  @foreach ($child->children as $grandson)
                    <li>{{ $grandson->name }}</li>
                  @endforeach
                </ul>
              @endif            
          @endforeach
        </ul>
      @endif
    </li>
  @endforeach
</ul>


 <div id="MainMenu">
  <div class="list-group panel">

    <a href="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Parent</a>
    <div class="collapse" id="demo3">
      <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Child Subitem 1 <i class="fa fa-caret-down"></i></a>
      <div class="collapse list-group-submenu" id="SubMenu1">
        <a href="#" class="list-group-item" data-parent="#SubMenu1">Grandson Subitem 1 a</a>
        <a href="#" class="list-group-item" data-parent="#SubMenu1">Grandson Subitem 2 b</a>
        <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Subitem 3 c <i class="fa fa-caret-down"></i></a>
        <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
          <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 1</a>
          <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 2</a>
        </div>
        <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 4 d</a>
      </div>
      <a href="javascript:;" class="list-group-item">Subitem 2</a>
      <a href="javascript:;" class="list-group-item">Subitem 3</a>
    </div>

    <a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 4</a>
    <div class="collapse" id="demo4">
      <a href="" class="list-group-item">Subitem 1</a>
      <a href="" class="list-group-item">Subitem 2</a>
      <a href="" class="list-group-item">Subitem 3</a>
    </div>

  </div>
</div> 




<div id="MainMenu">
  <div class="list-group panel">
    @foreach ($categories as $parent)
      
      @if ($parent->children->count())
        <!-- Parent Item 1 -->
        <a href="#menu{{ $parent->id }}" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">
          {{ $parent->name }}
        </a>
          <div class="collapse" id="menu{{ $parent->id }}">      
            @foreach ($parent->children as $child)
                @if ($child->children->count())
                  <a href="#submenu{{ $parent->id }}" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">
                    <!-- Child Subitem 1 -->
                    {{ $child->name }}
                    <i class="fa fa-caret-down"></i>
                  </a>
                  <div class="collapse" id="submenu{{ $parent->id }}">
                    @foreach ($child->children as $grandson)
                        <!-- Grandson SubSubitem 1 / No childs-->
                        <a href="#" class="list-group-item">{{ $grandson->name }}</a>
                    @endforeach
                  </div>


                @else
                  <!-- Child Subitem 1 / No childs-->
                  <a href="#" class="list-group-item">{{ $child->name }}</a>
                @endif

                      
            @endforeach
          </div>
      @else
        <!-- Parent Item 1 / No childs-->
        <a href="#" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">
          {{ $parent->name }}
        </a>      
      @endif       
    @endforeach
  </div>
</div> 




          {!! $tree !!}
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
