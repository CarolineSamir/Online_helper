<?php $__env->startSection('content'); ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <div class="card">
                <img src="<?php echo e(asset('/storage/app/public/products/')); ?>/<?php echo e($product->image); ?>">
                <div class="">

                </div>
                <div class="card-body">
                    <h6 class="card-title cursor-pointer"><?php echo e($product->name); ?> : <?php echo e($product->description); ?></h6>
                    <div class="clearfix">
                        <p class="mb-0 float-start"><strong><?php echo e($product->amount); ?></strong> Amount</p>
                        <p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span><?php echo e($product->price); ?></span></p>
                    </div>
                    <div class="d-flex align-items-center mt-3 fs-6">
                        <div class="cursor-pointer">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-secondary"></i>
                        </div>
                        <p class="mb-0 ms-auto">4.2(182)</p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/products/show.blade.php ENDPATH**/ ?>