<?php $__env->startSection('content'); ?>

    <h6 class="mb-0 text-uppercase">Orders</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>order_id</th>
                    <th>product</th>
                    <th>customer</th>
                    <th>price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($order->id); ?></th>
                        <th><?php echo e($order->order_id); ?></th>
                        <td><?php echo e($order->product->name); ?></td>
                        <td><?php echo e($order->customer->name); ?></td>
                        <td><?php echo e($order->price); ?></td>
                        <td >
                            <a id="ship" href="<?php echo e(route('shipment-new', $order->id)); ?>" class="btn btn-sm btn-primary" >ship</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/orders/Pending_orders.blade.php ENDPATH**/ ?>