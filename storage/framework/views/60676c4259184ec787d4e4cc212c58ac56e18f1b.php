<?php $__env->startSection('content'); ?>

    <h6 class="mb-0 text-uppercase">Table head</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th class="t_style">Actions</th>

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <th><?php echo e($company->id); ?></th>
                        <td><?php echo e($company->name); ?></td>

                        <td>
                            <div class="d-flex order-actions justify-content-center" style="">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit<?php echo e($company->id); ?>"
                                   class="text-primary">
                                    <i class="fa-solid fa-pen"></i>

                                </a>
                                <form method="post" action="<?php echo e(route('company-delete')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($company->id); ?>">
                                    <button value="submit" class="text-danger myButton"
                                            href="">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                <button href="#" data-bs-toggle="modal" data-bs-target="#costs<?php echo e($company->id); ?>"
                                        type="button" class="btn btn-sm btn-outline-primary orderButton">costs
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <form method="post" action="<?php echo e(route('company-update')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($company->id); ?>"/>
                        <div class="modal fade " tabindex="-1" id="edit<?php echo e($company->id); ?>">
                            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <div class="model-title d-flex align-items-center">
                                            <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                                            </div>
                                            <h5 class="mb-0 text-primary">Company</h5>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="inputName" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="inputName" name="name"
                                                       value="<?php echo e($company->name); ?>">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <?php ($city_price = $company->city_price); ?>
                                                    <?php $__currentLoopData = \App\Models\Country::where('sub_of', 0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-md-6 mt-2">
                                                            <label for="inputAmount" class="form-label"><?php echo e($country->name); ?></label>
                                                            <input type="hidden" name="country_id[]" value="<?php echo e($country->id); ?>">
                                                            <input type="text" class="form-control" id="inputAmount"  name="costs[]" value="<?php echo e($city_price[$country->id] ?? ''); ?>">
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary px-5">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <div class="modal fade " tabindex="-1" id="costs<?php echo e($company->id); ?>">
                        <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <div class="model-title d-flex align-items-center">
                                        <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Company Costs</h5>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php $__currentLoopData = $company->city_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $city_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php ($country = \App\Models\Country::find($id)); ?>
                                        <span class="badge rounded-pill bg-success font-10">
                                       <?php echo e($country->name ?? 'N/A'); ?> : <?php echo e($city_price.'. EGP'); ?>

                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .order-actions a {
            background: #f1f1f100 !important;
            border: none !important;
            margin-right: 11px !important;
        }

        .myButton {
            border: none;
            background: none;
            margin-left: 11px !important;
        }

        button, input, optgroup, select, textarea {
            font-size: large;
        }

        .badge{
            font-size: 15px !important;
        }
    </style>

<?php $__env->stopPush(); ?>







<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/shipping companies/index.blade.php ENDPATH**/ ?>