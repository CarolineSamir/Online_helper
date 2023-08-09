<?php $__env->startSection('content'); ?>
    <div class="card p-5">
        <div class="card-title d-flex align-items-center">
            <div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather me-2 feather-truck text-primary"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            </div>
            <h5 class="mb-0 text-primary">Company</h5>
        </div>
        <hr>
        <form class="row " method="POST" action="<?php echo e(route('company-add')); ?>">
            <?php echo csrf_field(); ?>

            <div class="col-md-6">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="name" value="<?php echo e(old('name')); ?>">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <?php $__currentLoopData = \App\Models\Country::where('sub_of', 0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 mt-2">
                            <label for="inputAmount" class="form-label"><?php echo e($country->name); ?></label>
                            <input type="hidden" name="country_id[]" value="<?php echo e($country->id); ?>">
                            <input type="text" class="form-control" id="inputAmount"  name="costs[]" value="0">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary px-5">Save</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/shipping companies/new.blade.php ENDPATH**/ ?>