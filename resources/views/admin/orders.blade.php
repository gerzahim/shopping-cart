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
                     <h2>List Orders </h2>   
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
              <td class="image">Date</td>
              <td class="description">Email</td>
              <td class="price">Order Id</td>
              <td class="price">Status</td>
              <td class="quantity">Edit Tracking</td>
              <td class="quantity">See Pictures</td>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td class="cart_description">
                <h4>{{ $order['created_at']->format('F d, Y h:i:s A') }}</h4>
              </td>
              <td class="cart_description">
                <h4>{{ $order['email'] }}</h4>
              </td>
              <td class="cart_price">
                <p>{{ $order['id'] }}</p>
              </td>

              <td class="cart_price">
                  @if($order['status'] == "0")
                      <p>Pick Up Order</p>
                  @elseif($order['status'] == "1")
                      <p>Pending to Delivery</p>
                  @else
                      <p>Out to Delivery</p>   
                  @endif
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="ordersedit/{{ $order['id'] }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="seepicturesorder/{{ $order['id'] }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
            </tr>            
          </tfoot>
        </table>

      </div>
    {{ $orders->links() }}




    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

@endsection
