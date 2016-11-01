@extends('admin.index')

@section('content')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Tracking Order </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->

<section id="cart_items">
    <div class="container">
    <br><br>
      @if(count($errors)>0)
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
      @endif
      
      @if(Session::has('message'))
          <div class="alert alert-success">
              {{ Session::get('message') }}
          </div>
      @endif    
        
      <div class="step-one">
        <h2 class="heading"></h2>
      </div>  

          <div class="col-sm-8">
            <div class="contact-form">

                  <form action="{{ route('orderupdate', $order->id) }}" id="upd-form-user" class="contact-form row" name="upd-form-user" method="post">
                    <div class="form-group col-md-6">
                      <label for="address">Date Order:</label>
                      <input type="text" id="email" class="form-control" value="{{ $order['created_at'] }}" readonly> 
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Order Id:</label>
                      <input type="text" id="id" class="form-control" value="{{ $order['id'] }}" readonly> 
                    </div>                    
                    <div class="form-group col-md-6">
                      <label for="address">Email:</label>
                      <input type="text" id="email" class="form-control" value="{{ $order['email'] }}" readonly> 
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Name:</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ $order['name'] }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="phone">Telephone:</label>
                    <input type="text" id="phone" class="form-control" name="phone" value="{{ $order['phone'] }}" readonly>       
                    </div>                    
                    <div class="form-group col-md-12">

                      <label for="address">Detail Order:</label>

                              <div class="panel panel-default">
                                <div class="panel-body">
                                  <ul class="list-group">
                                    @foreach($order->cart->items as $item)
                                      <li class="list-group-item">
                                        <span class="badge">${{ $item['price'] }}</span>
                                        {{ $item['item']['title'] }} | <strong> Sku: </strong> {{ $item['item']['sku'] }} | <strong> {{ $item['qty'] }} </strong> Units 
                                      </li>
                                    @endforeach
                                  </ul>
                                </div>
                                <div class="panel-footer"><strong>SubTotal: ${{ $order->cart->totalPrice }}</strong></div>
                                <div class="panel-footer"><strong>State Tax to be Collected: ${{ $order->cart->taxCost }}</strong></div>
                                <div class="panel-footer"><strong>SubTotal + Tax: ${{ $order->cart->totalPrice+$order->cart->taxCost }}</strong></div>
                                <div class="panel-footer"><strong>Shipping Cost: ${{ $order->cart->shippingCost }}</strong></div>
                                <div class="panel-footer"><strong>Grand Total: ${{ $order->cart->totalCost }}</strong></div>
                              </div>

                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Payment Id:</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ $order['payment_id'] }}" readonly>
                    </div> 
                    <div class="form-group col-md-6"></div>
                    <div class="form-group col-md-6">
                                        <label for="address">Status Order:</label>  <br>
                      <select id="status" name="status">
                        @if($order['status'] == '0'))
                          <option selected="selected" value="0">Pick Up Order</option>
                          <option value="1">Pending to Delivery</option>
                          <option value="2">Out to Delivery</option>
                        @elseif($order['status'] == '1'))
                          <option value="0">Pick Up Order</option>
                          <option selected="selected" value="1">Pending to Delivery</option>
                          <option value="2">Out to Delivery</option>
                        @else
                          <option value="0">Pick Up Order</option>
                          <option value="1">Pending to Delivery</option>
                          <option selected="selected" value="2">Out to Delivery</option>
                        @endif
                      </select>           
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Shipping Company:</label>
                        <input type="text" id="shipcompany" class="form-control" name="shipcompany" value="{{ $order['shipcompany'] }}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Tracking Number:</label>
                        <input type="text" id="tracking" class="form-control" name="tracking" value="{{ $order['tracking'] }}">
                    </div>                    
                                                          
                    <div class="form-group col-md-6"></div>
                    <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-success">Update Info</button>       
                    </div>       
                  {{ csrf_field() }}                                                           
                </form>
            </div>
          </div>
    
      
    </div>

  </section> <!--/#cart_items-->          <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

@endsection
