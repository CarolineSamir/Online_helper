<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4  d-flex align-items-center">
                            <h6 class="mb-0 text-uppercase text-primary">countries</h6>
                        </div>
                        <div class="col-md-8 d-flex justify-content-end ">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#new_country"
                               class="btn btn-sm btn-outline-primary d-flex align-items-center justify-content-end">
                                Add New Country
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table mb-0">
                        <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>country</th>
                            <th class="t_style">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($countries->count() > 0): ?>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr style="<?php echo e($country_id ==$country->id ? 'background-color: rgba(128,128,128,0.21) ' : ''); ?>">
                                    <td wire:click="viewCity(<?php echo e($country->id); ?>)"><?php echo e($country->id); ?></td>
                                    <td wire:click="viewCity(<?php echo e($country->id); ?>)"><?php echo e($country->name); ?></td>
                                    <td class="d-flex justify-content-center">
                                        <div class="d-flex order-actions ">
                                            <div class="d-flex order-actions " style="">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#edit<?php echo e($country->id); ?>"
                                                   class="text-primary">
                                                    <i class="fa-solid fa-pen"></i>
                                                    <input type="hidden" name="country_id"
                                                           value="<?php echo e($country->id); ?>">
                                                </a>
                                                <button class="text-danger myButton"
                                                    >
                                                    <input type="hidden" name="id" value="">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <form id="edit_country_<?php echo e($country->id); ?>">
                                    <div class="container">
                                        <div class="modal fade " tabindex="-1" id="edit<?php echo e($country->id); ?>">
                                            <div
                                                class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <div class="model-title d-flex align-items-center">
                                                            <div>
                                                                <i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                                                            </div>
                                                            <h5 class="mb-0 text-primary">edit Category</h5>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="id"
                                                                       value="<?php echo e($country->id); ?>">

                                                                <label for="inputName" class="form-label">Arabic
                                                                    Country or region</label>
                                                                <input type="text" class="form-control"
                                                                       name="name"
                                                                       value="<?php echo e($country->name); ?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputSub" class="form-label">Sub
                                                                    Of </label>
                                                                <select class="form-control" id="inputSub"
                                                                        name="sub_of" disabled>
                                                                    <option value="0">-no sub of-</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                
                                                                <a class="btn btn-primary px-5"
                                                                   onclick="edit(<?php echo e($country->id); ?>)"
                                                                   wire:click=$emit('refreshCountry')>Save
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6" id="city-list">
            <div class="card">
                <div class="card-header">
                    <div class="row" style="margin:6px -8px !important;">
                        <div class="col-md-4  d-flex align-items-center">
                            <h6 class="mb-0 text-uppercase text-primary">Products</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if($cities !== null): ?>
                        <table class="table mb-0">
                            <thead class="table-dark">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th class="t_style">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($city->id); ?></td>
                                    <td><?php echo e($city->name); ?></td>
                                    <td class="d-flex justify-content-center">
                                        <div class="d-flex order-actions ">
                                            <div class="d-flex order-actions " style="">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#edit<?php echo e($city->id); ?>"
                                                   class="text-primary">
                                                    <i class="fa-solid fa-pen"></i>
                                                    <input type="hidden" name="product_id" value="">
                                                </a>
                                                <button class="text-danger myButton"
                                                        wire:click="delete()">
                                                    <input type="hidden" name="id" value="">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <form id="edit_city_<?php echo e($city->id); ?>">
                                    <div class="container">
                                        <div class="modal fade " tabindex="-1" id="edit<?php echo e($city->id); ?>">
                                            <div
                                                class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <div class="model-title d-flex align-items-center">
                                                            <div>
                                                                <i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                                                            </div>
                                                            <h5 class="mb-0 text-primary">edit Category</h5>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="id"
                                                                       value="<?php echo e($city->id); ?>">

                                                                <label for="inputName" class="form-label">Arabic
                                                                    Country or region</label>
                                                                <input type="text" class="form-control"
                                                                       name="name"
                                                                       value="<?php echo e($city->name); ?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputSub" class="form-label">Sub
                                                                    Of </label>
                                                                <select class="form-control" id="inputSub"
                                                                        name="sub_of" disabled>
                                                                    <option value="0">-no sub of-</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                
                                                                <a class="btn btn-primary px-5"
                                                                   onclick="editCity(<?php echo e($city->id); ?>)"
                                                                   wire:click=$emit('refreshCountry')>Save
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="modal fade " tabindex="-1" id="new_country">
            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                <div class="modal-content ">
                    <div class="modal-header">
                        <div class="model-title d-flex align-items-center">
                            <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Add country</h5>
                        </div>
                    </div>
                    <div class="modal-body">
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
            </div>
        </div>
    </div>
    <?php $__env->startPush('script'); ?>
        <script>
            function edit(id) {

                var edit_country = $('#edit_country_' + id).serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.post({
                    url: '<?php echo e(route('country-update')); ?>',
                    data: edit_country,
                    success: function (data) {
                        success("updated !!");
                        Livewire.emit('refreshCountry');
                        $('#edit' + id).modal('hide');
                    },
                    error: function (data) {
                        error("Error updating country")
                        Livewire.emit('refreshCountry');
                        $('#edit' + id).modal('hide');
                    }
                });
            }
        </script>
        <script>
            function editCity(id) {

                var edit_country = $('#edit_city_' + id).serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.post({
                    url: '<?php echo e(route('country-update')); ?>',
                    data: edit_country,
                    success: function (data) {
                        success("updated !!");
                        Livewire.emit('refreshCountry');
                        $('#edit' + id).modal('hide');
                    },
                    error: function (data) {
                        error("Error updating country")
                        Livewire.emit('refreshCountry');
                        $('#edit' + id).modal('hide');
                    }
                });
            }
        </script>
    <?php $__env->stopPush(); ?>
</div>
<?php /**PATH C:\localhost\htdocs\online_helper\resources\views/livewire/country-wire.blade.php ENDPATH**/ ?>