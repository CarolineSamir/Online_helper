<?php $__env->startSection('content'); ?>
<div class="row d-flex align-items-center">
    <div class="col-md-6">
        <h6 class="mb-0 text-uppercase">Table head</h6>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
        <a class="btn btn-secondary" href="<?php echo e(url()->previous()); ?>"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
</div>

    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>Products</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($order->id); ?></th>
                        <td><?php echo e($order->product->name); ?></td>
                        <td><?php echo e($order->product->Category->name); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/customers/orders.blade.php ENDPATH**/ ?>