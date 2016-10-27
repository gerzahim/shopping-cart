<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h3>You have a New Order Notification Waiting for </h3>

                <p>Details </p>
                <p>Costumer : {{ $costumer }}</p>
                <p>Company : {{ $companyname }}</p>
                <p>Email : {{ $email }}</p>                
                <p>Phone : {{ $phone }}</p>
                <p>Address : {{ $address }}.</p>
                <p>{{ $city }}, {{ $state }} {{ $zip}} {{ $country }}.</p>
                <br>                
                <p>Order id #{{ $idorder }}</p>

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
                <p>. </p>

    
            </div>
        </div>
    </div>
</div>

