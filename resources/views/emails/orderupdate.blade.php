<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <h3>Order Update</h3>
                <p>Hello {{ $costumer }},</p>
                <p>Thank you for shopping with us. You order has been shipped.</p>
                <p>Details </p>
                <p>Order id #{{ $idorder }}</p>
                <strong>
                <h3>
                <p>Ship Company : {{ $shipcompany }}</p>
                <p>Tracking Number : {{ $tracking }}</p>
                </h3>
                </strong>

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
                    <div class="panel-footer">
                        <strong>
                            <p>SubTotal: ${{ $order->totalPrice }}</p>
                            <p>Shipping: ${{ $order->shippingCost }}</p>
                            <p>Total Cost: ${{ $order->totalCost }}</p>
                        </strong>
                    </div>
                </div>                
                <p> We hope to see you again soon. </p>
                <p>{{ $name_site }}  </p>
                <p>. </p>

    
            </div>
        </div>
    </div>
</div>

