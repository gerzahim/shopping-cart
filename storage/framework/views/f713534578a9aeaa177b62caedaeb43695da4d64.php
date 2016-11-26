<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <h3>Order Confirmation</h3>
                <p>Hello <?php echo e($costumer); ?>,</p>
                <p>Thank you for shopping with us. You ordered. We’ll send a confirmation when your item ships.</p>
                <p>Details </p>
                <p>Order id #<?php echo e($idorder); ?></p>

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
                <p>Delivery Option : <strong><?php echo e($shipping); ?></strong></p>                
                <p> We hope to see you again soon. </p>
                <p><?php echo e($name_site); ?>  </p>
                <p>. </p>

    
            </div>
        </div>
    </div>
</div>

