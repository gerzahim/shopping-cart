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
                     <h2>List Users </h2>   
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
              <td class="image">Email</td>
              <td class="description">Name</td>
              <td class="price">Phone</td>
              <td class="price">Status</td>
              <td class="quantity">Edit</td>
              <td class="total">Delete</td>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td class="cart_description">
                <h4><a href="">{{ $user['email'] }}</a></h4>
              </td>
              <td class="cart_description">
                <h4><a href="">{{ $user['name'] }}</a></h4>
              </td>
              <td class="cart_price">
                <p>{{ $user['phone'] }}</p>
              </td>

              <td class="cart_price">
                  @if($user['status'] == "1")
                      <p>Active</p>
                  @else
                      <p>Inactive</p>   
                  @endif
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="usersedit/{{ $user['id'] }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="removeuser/{{ $user['id'] }}"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            @endforeach 



          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="description"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="total"></td>
              <td class="total"></td>
            </tr>            
          </tfoot>
        </table>

      </div>
    {{ $users->links() }}




    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

@endsection
