<?php $__env->startSection('content'); ?>
    <div class="card radius-10">
        <div class="card-body">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control" onchange="(window.location = this.options[this.selectedIndex].value);">
                            <option value="<?php echo e(Request::url()); ?>/?status=0" <?php echo e($request->status == '0' ? 'selected' : ''); ?>>Not Collected</option>
                            <option value="<?php echo e(Request::url()); ?>/?status=1" <?php echo e($request->status == '1' ? 'selected' : ''); ?>>Collected</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive lead-table">
                <table class="table mb-0 align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Order Id</th>
                        <th>Company</th>
                        <th class="t_style">money</th>
                        <th class="t_style">costs</th>
                        <th class="t_style">Profits</th>
                        <th class="t_style">Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $revenues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($revenue->id); ?></td>
                            <td><?php echo e($revenue->order_id); ?></td>
                            <td><?php echo e($revenue->company->name); ?></td>
                            <td class="t_style"><?php echo e($revenue->income); ?></td>
                            <td class="t_style"><?php echo e($revenue->costs); ?></td>
                            <td class="t_style"><?php echo e($revenue->profits); ?></td>
                            <td class="t_style">
                                <form method="post" action="<?php echo e(route('revenue-addToTreasury')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php if($revenue->status == 0): ?>
                                    <input type="hidden" name="id" value="<?php echo e($revenue->id); ?>"/>
                                    <button type="submit" class="btn btn-outline-success">
                                        <i class="fa-solid fa-circle-dollar-to-slot me-0" id="collect"></i>
                                    </button>
                                    <?php else: ?>
                                    <span class="text-success">Collected</span>
                                    <?php endif; ?>
                                </form>
                            </td>


                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




















<?php $__env->stopSection(); ?>



































































































































































<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/financials/revenues.blade.php ENDPATH**/ ?>