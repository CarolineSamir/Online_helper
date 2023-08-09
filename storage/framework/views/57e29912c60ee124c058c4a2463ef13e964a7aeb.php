<?php $__env->startSection('content'); ?>
    <div class="card p-5">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">Countries</h5>
        </div>
        <hr>
        <div class="card-body">
            <form class="row g-3" method="POST" action="<?php echo e(route('country-add')); ?>">
                <?php echo csrf_field(); ?>
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Arabic Country or region</label>
                    <input type="text" class="form-control" id="inputName" name="name"
                           value="<?php echo e(old('name')); ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputSub" class="form-label">Sub Of</label>
                    <select class="form-control" id="inputSub" name="sub_of">
                        <option value="0">-no sub of-</option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($country->sub_of == 0): ?>{
                            <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                            }
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/countries/new.blade.php ENDPATH**/ ?>