@extends('layouts.cleancontent')

@section('content')
   <div id="contact-page" class="container">
          <div class="row">       
            <div class="col-sm-12">                 
              <h2 class="title text-center">SHIPPING POLICY </h2>
              <br>                             
            </div>          
          </div>


          <div class="col-sm-12">
            <div class="contact-form">
              <p>
                <table border="1" cellpadding="2" cellspacing="0" align="center">
                  <tbody>
                    <tr>
                      <td align="center" colspan="5">
                        <b>Shipping &amp; Handling Charge </b>
                      </td>
                    </tr>
                    <tr>
                      <td align="center"><b>Order Value</b></td>
                      <td align="center"><b>Ground</b><br>2-7 Business days*</td>
                      <td align="center"><b>2nd Day</b><br>2 Business days*</td>
                      <td align="center"><b>Next Day</b><br>1 Business day*</td>
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
                          </tr>  
                        @else
                          {{-- // is odd --}}
                          <tr>
                            <td align="center" bgcolor="#cccccc"><b> {{ $shipping->name }}</b></td>
                            <td align="right" bgcolor="#cccccc"> $ {{ $shipping->ground }}</td>
                            <td align="right" bgcolor="#cccccc"> $ {{ $shipping->second_day }}</td>
                            <td align="right" bgcolor="#cccccc"> $ {{ $shipping->next_day }}</td>
                          </tr>                          
                        @endif 

                    

                    @endforeach   


                    {{--

                    @foreach( $shippings as $shipping)

                      <tr>
                        <td align="center"><b> {{ $shipping->name }}</b></td>
                        <td align="right"> {{ $shipping->ground }}</td>
                        <td align="right"> {{ $shipping->second_day }}</td>
                        <td align="right"> {{ $shipping->next_day }}</td>
                      </tr>                      

                    @endforeach                    
                    <tr>
                      <td><b>Up to $25.00</b></td>
                      <td align="right">$ 6.25</td>
                      <td align="right">$ 11.00</td>
                      <td align="right">$ 20.00</td>
                    </tr>
                    <tr>
                      <td bgcolor="#cccccc"><b>$25.01 to $100.00</b></td>
                      <td align="right" bgcolor="#cccccc">$ 7.25</td>
                      <td align="right" bgcolor="#cccccc">$ 10.00</td>
                      <td align="right" bgcolor="#cccccc">$ 14.00</td>
                      <td align="right" bgcolor="#cccccc">$ 25.00</td>
                    </tr>
                    <tr>
                      <td><b>$100.01 to $200.00</b></td>
                      <td align="right">$ 8.25</td>
                      <td align="right">$ 12.00</td>
                      <td align="right">$ 17.00</td>
                      <td align="right">$ 30.00</td>
                    </tr>
                    <tr>
                      <td bgcolor="#cccccc"><b>$200.01 &amp; Over</b></td>
                      <td align="right" bgcolor="#cccccc">$ 9.25</td>
                      <td align="right" bgcolor="#cccccc">$ 14.00</td>
                      <td align="right" bgcolor="#cccccc">$ 20.00</td>
                      <td align="right" bgcolor="#cccccc">$ 40.00</td>
                    </tr>
                    --}}                   
                    <tr>
                      <td align="right" colspan="5"><b>*Add 1-2 business days for processing</b></td>
                    </tr>
                  </tbody>
                </table>
              </p>
            </div>
            
          </div>

          
   </div>



<hr>


@endsection

