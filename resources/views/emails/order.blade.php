<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <h3>Order Confirmation</h3>
                <p>Hello {{ $costumer }},</p>
                <p>Thank you for shopping with us. You ordered. We’ll send a confirmation when your item ships.</p>
                <p>Details </p>
                <p>Order Placed: {{ $order_placed }}</p>               
                <p>Order id #{{ $idorder }}</p>
                <br>
                <br>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->items as $item)
                                <li class="list-group-item">
                                    <span class="badge">${{ $item['price'] }}</span>
                                    {{ $item['item']['title'] }} | <strong> Sku: </strong> {{ $item['item']['sku'] }} | <strong> {{ $item['qty'] }} </strong> Units 
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <br>
                    <br>
                    <div class="panel-footer">
                            <p>SubTotal: <strong>${{ $order->totalPrice }}</strong></p>
                            <p>Shipping: <strong>${{ $order->shippingCost }}</strong></p>
                            <p>Total Before Tax : <strong>${{ $order->totalPrice+$order->shippingCost }}</strong></p>
                            <p>State Tax to be Collected : <strong>${{ $order->taxCost }}</strong></p>
                            <p>Total Cost: <strong>${{ $order->totalCost }}</strong></p>
                    </div>
                </div>
                <p>Delivery Option : <strong>{{ $shipping }}</strong></p>                
                <p> We hope to see you again soon. </p>
                <p>{{ $name_site }}  </p>
                <p>. </p>

    
            </div>
        </div>
    </div>
</div>

