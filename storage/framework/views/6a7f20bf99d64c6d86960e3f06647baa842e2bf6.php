<?php $__env->startSection('content'); ?>
    <h6 class="mb-0 text-uppercase">shipments</h6>
    <hr>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" onchange="(window.location = this.options[this.selectedIndex].value);">
                        <option value="<?php echo e(Request::url()); ?>/?delivered=0" <?php echo e($request->delivered == '0' ? 'selected': ''); ?>>
                            Not delivered
                        </option>
                        <option value="<?php echo e(Request::url()); ?>/?delivered=1" <?php echo e($request->delivered == '1' ? 'selected': ''); ?>>
                            delivered
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table mb-0 align-middle">
                <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>Order Id</th>
                    <th>country</th>
                    <th>Deliver date</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($shipment->id); ?></th>
                        <td><?php echo e($shipment->order_id); ?></td>
                        <td><?php echo e($shipment->Country->name); ?></td>
                        <td><?php echo e($shipment->deliver_date); ?></td>

                        <form method="post" action="<?php echo e(route('delivered_order')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php if($request->delivered == 0): ?>
                                <input type="hidden" name="order_id" value="<?php echo e($shipment->order_id); ?>">
                                <input type="hidden" name="shipment_id" value="<?php echo e($shipment->id); ?>">
                                <input type="hidden" name="country_id" value="<?php echo e($shipment->country_id); ?>">
                                <input type="hidden" name="shipping_company_id" value="<?php echo e($shipment->shipping_company_id); ?>">
                                <td><button type="submit" class="btn btn-primary">Deliver</button></td>
                            <?php else: ?>
                                <td>Delivered</td>
                            <?php endif; ?>
                        </form>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/shipments/index.blade.php ENDPATH**/ ?>