<?php $__env->startSection('content'); ?>
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">Customer</h5>
        </div>
        <hr>
        <div class="card-body">
            <form class="row g-3" method="POST" action="<?php echo e(route('customer-add')); ?>">
                <?php echo csrf_field(); ?>
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name"
                           value="<?php echo e(old('name')); ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPhone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="inputPhone" name="phone" value="<?php echo e(old('phone')); ?>">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input class="form-control" id="inputAddress" placeholder="Address..."
                           name="address">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/customers/new.blade.php ENDPATH**/ ?>