<?php $__env->startSection('content'); ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 bg-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Revenue</p>
                            <h4 class="my-1 text-white">$<?php echo e($revenues->sum('profits')); ?></h4>
                            
                        </div>
                        <div class="widgets-icons bg-white text-success ms-auto"><i class="bx bxs-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-primary bg-gradient">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Total Orders</p>
                            <h4 class="my-1 text-white"><?php echo e($orders->count()); ?></h4>
                        </div>
                        <div class="text-white ms-auto font-35"><i class="bx bx-cart-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <a class="card radius-10 bg-danger bg-gradient" href="<?php echo e(route('revenue-index')); ?>">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Total Income</p>
                            <h4 class="my-1 text-white">$89,245</h4>
                        </div>
                        <div class="text-white ms-auto font-35"><i class="bx bx-dollar"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <div class="card radius-10 bg-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-dark">Total Customers</p>
                            <h4 class="my-1 text-dark"><?php echo e($customers->count()); ?></h4>
                            
                        </div>
                        <div class="widgets-icons bg-white text-dark ms-auto"><i class="bx bxs-group"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    
    
    
    
    
<?php $__env->stopPush(); ?>























<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/home.blade.php ENDPATH**/ ?>