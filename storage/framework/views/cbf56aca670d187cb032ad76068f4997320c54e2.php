<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <h3>Order Update</h3>
                <p>Hello <?php echo e($costumer); ?>,</p>
                <p>Thank you for shopping with us. You order has been shipped.</p>
                <p>Details </p>
                <p>Order id #<?php echo e($idorder); ?></p>
                <strong>
                <h3>
                <p>Ship Company : <?php echo e($shipcompany); ?></p>
                <p>Tracking Number : <?php echo e($tracking); ?></p>
                </h3>
                </strong>

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
                        <strong>
                            <p>SubTotal: $<?php echo e($order->totalPrice); ?></p>
                            <p>Shipping: $<?php echo e($order->shippingCost); ?></p>
                            <p>Total Cost: $<?php echo e($order->totalCost); ?></p>
                        </strong>
                    </div>
                </div>                
                <p> We hope to see you again soon. </p>
                <p><?php echo e($name_site); ?>  </p>
                <p>. </p>

    
            </div>
        </div>
    </div>
</div>

