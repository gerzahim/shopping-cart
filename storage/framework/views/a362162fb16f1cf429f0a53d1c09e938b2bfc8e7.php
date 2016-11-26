<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h3>You have a New Order Notification Waiting for </h3>

                <p>Details </p>
                <p>Costumer : <?php echo e($costumer); ?></p>
                <p>Company : <?php echo e($companyname); ?></p>
                <p>Email : <?php echo e($email); ?></p>                
                <p>Phone : <?php echo e($phone); ?></p>
                <p>Address : <?php echo e($address); ?>.</p>
                <p><?php echo e($city); ?>, <?php echo e($state); ?> <?php echo e($zip); ?> <?php echo e($country); ?>.</p>
                <br>                
                <p>Order id #<?php echo e($idorder); ?></p>
                <p>Delivery Option : <strong><?php echo e($shipping); ?></strong></p>               

                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php foreach($order->items as $item): ?>
                                <li class="list-group-item">
                                    <span class="badge">$<?php echo e($item['price']); ?></span>
                                    <?php echo e($item['item']['title']); ?> | <strong> Sku: </strong> <?php echo e($item['item']['sku']); ?> | <strong> <?php echo e($item['qty']); ?> </strong> Units 
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="panel-footer">
                            <p>SubTotal: <strong>$<?php echo e($order->totalPrice); ?></strong></p>
                            <p>Shipping: <strong>$<?php echo e($order->shippingCost); ?></strong></p>
                            <p>Total Before Tax : <strong>$<?php echo e($order->totalPrice+$order->shippingCost); ?></strong></p>
                            <p>State Tax to be Collected : <strong>$<?php echo e($order->taxCost); ?></strong></p>
                            <p>Total Cost: <strong>$<?php echo e($order->totalCost); ?></strong></p>

                    </div>
                </div>                
                <p>. </p>

    
            </div>
        </div>
    </div>
</div>

