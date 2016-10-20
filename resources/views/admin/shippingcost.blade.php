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
                     <h2>Shipping Cost</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  

  <section id="cart_items">

          <div class="col-sm-12">
            <div class="contact-form">
              <p>
                <table border="1" cellpadding="2" cellspacing="0" align="center">
                  <tbody>
                    <tr>
                      <td align="center" colspan="6">
                        <b>Shipping &amp; Handling Charge </b>
                      </td>
                    </tr>
                    <tr>
                      <td align="center"><b>Order Value</b></td>
                      <td align="center"><b>Ground</b><br>2-7 Business days*</td>
                      <td align="center"><b>2nd Day</b><br>2 Business days*</td>
                      <td align="center"><b>Next Day</b><br>1 Business day*</td>
                      <td align="center"><b><h3>Edit</h3></b></td>
                    </tr>
        
                    
                    @foreach( $shippings as $shipping)

                        <?php (isset($i))?$i++:($i = 0); ?>
                        

                        @if ($i % 2 == 0)
                          {{-- // is even --}}
                          <tr>
                            <td align="center"><b> {{ $shipping->name }}</b></td>
                            <td align="right"> $ {{ $shipping->ground }}</td>
                            <td align="right"> $ {{ $shipping->second_day }}</td>
                            <td align="right"> $ {{ $shipping->next_day }}</td>
                            <td align="right"> 
                              <a class="cart_quantity_delete" href="{{ URL::to('/shippingedit/') }}/{{ $shipping->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                          </tr>  
                        @else
                          {{-- // is odd --}}
                          <tr>
                            <td align="center" bgcolor="#cccccc"><b> {{ $shipping->name }}</b></td>
                            <td align="right" bgcolor="#cccccc"> $ {{ $shipping->ground }}</td>
                            <td align="right" bgcolor="#cccccc"> $ {{ $shipping->second_day }}</td>
                            <td align="right" bgcolor="#cccccc"> $ {{ $shipping->next_day }}</td>
                            <td align="right"> 
                              <a class="cart_quantity_delete" href="{{ URL::to('/shippingedit/') }}/{{ $shipping->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                          </tr>                          
                        @endif 

                    

                    @endforeach   
                
                    <tr>
                      <td align="right" colspan="5"><b>*Add 1-2 business days for processing</b></td>
                    </tr>
                  </tbody>
                </table>
              </p>
            </div>
            
          </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->

 


                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

@endsection
