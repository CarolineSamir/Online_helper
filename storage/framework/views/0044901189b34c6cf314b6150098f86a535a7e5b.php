<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('shipment-add')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">

        <div class="card p-5">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
                <h5 class="mb-0 text-primary">Order <?php echo e($order->id); ?></h5>
            </div>
            <hr>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="inputCompany" class="form-label">Company</label>
                    <select id="inputCompany" class="form-select" name="company_id">
                        <option selected="">Choose...</option>
                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputCountry" class="form-label">Country</label>
                    <select id="inputCountry" class="form-select" name="country_id">
                        <option selected="">Choose...</option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputDate" class="form-label">Date</label>
                    <input type="Date" class="form-control" id="inputDate" name="deliver_date" value="<?php echo e(old('deliver_date')); ?>">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/shipments/new.blade.php ENDPATH**/ ?>