<div>
    <div class="row" style="margin-top: 5px;">
        <div class=" d-flex align-items-center">
            <div class="col-md-6  d-flex align-items-center">
                <h6 class="mb-0 text-uppercase text-primary">customers</h6>
            </div>
            <div class="col-md-6 d-flex justify-content-end ">
                <a href="<?php echo e(route('customer-new')); ?>"
                   class="btn btn-sm btn-outline-primary d-flex align-items-center justify-content-end">Add New
                    Customer</a>
            </div>

        </div>

    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>address</th>
                    <th class="t_style">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if($customers->count() > 0): ?>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <th><?php echo e($customer->id); ?></th>
                            <td><?php echo e($customer->name); ?></td>
                            <td><?php echo e($customer->phone); ?></td>
                            <td><?php echo e($customer->address); ?></td>
                            <td class="d-flex justify-content-center">
                                
                                <div class="d-flex order-actions " style="">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit<?php echo e($customer->id); ?>"
                                       class="text-primary">
                                        <i class="fa-solid fa-pen"></i>

                                    </a>
                                    <input type="hidden" name="id" value="<?php echo e($customer->id); ?>">

                                    <button value="submit" class="text-danger myButton"
                                            wire:click="delete(<?php echo e($customer->id); ?>)">
                                        <input type="hidden" name="id" value="<?php echo e($customer->id); ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <input type="hidden" name="id" value="<?php echo e($customer->id); ?>">
                                    <button wire:click="viewProduct(<?php echo e($customer->id); ?>)"
                                            style="margin-right: 11px"
                                            class="btn btn-sm btn-outline-primary orderButton">
                                        Orders
                                    </button>
                                </div>
                            </td>
                        </tr>


                        <form id="edit_customer_<?php echo e($customer->id); ?>">
                            <div class="modal fade " tabindex="-1" id="edit<?php echo e($customer->id); ?>">
                                <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <div class="model-title d-flex align-items-center">
                                                <div><i class=" bx bxs-user  me-1 font-22 text-primary"></i>
                                                </div>
                                                <h5 class="mb-0 text-primary">Customer</h5>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <input type="hidden" name="id" value="<?php echo e($customer->id); ?>">
                                                    <label for="inputName" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="inputName" name="name"
                                                           value="<?php echo e($customer->name); ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputPhone" class="form-label">Phone</label>
                                                    <input type="text" class="form-control" id="inputPhone" name="phone"
                                                           value="<?php echo e($customer->phone); ?>">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputAddress" class="form-label">Address</label>
                                                    <input class="form-control" id="inputAddress"
                                                           placeholder="Address..."
                                                           name="address" value="<?php echo e($customer->address); ?>">
                                                </div>
                                                <div class="col-12">
                                                    <a class="btn btn-primary px-5" onclick="edit('<?php echo e($customer->id); ?>')"
                                                       wire:click=$emit('refreshCustomers')>Save</a>

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


    <h6 class="mb-0 text-uppercase text-primary">orders</h6>
    <hr>
    
    <?php if($error): ?>
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
            <div class="text-white"><?php echo e($error); ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php ($this->error = null); ?>
    <?php endif; ?>
    
    <?php if($orders != null): ?>
        <div class="card sticky-top">
            <div class="card-body">
                <table class="table mb-0">
                    <thead class="table-dark">
                    <tr>
                        <th>id</th>
                        <th>Products</th>
                        <th>Category</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <th><?php echo e($order->id); ?></th>
                            <td><?php echo e($order->product->name); ?></td>
                            <td><?php echo e($order->product->Category->name); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>


    <?php $__env->startPush('script'); ?>
        <script>
            function edit(id) {
                var edit_customer = $('#edit_customer_'+id).serialize();
                console.log(edit_customer);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.post({
                    url: '<?php echo e(route('customer-update')); ?>',
                    data: edit_customer,
                    success: function (data) {
                        success("updated !!");
                        console.log(data);
                        Livewire.emit('refreshCustomers')
                        $('#edit'+id).modal('hide');

                    },
                    error: function (data) {
                        console.log(data);

                    }
                });
            }
        </script>
    <?php $__env->stopPush(); ?>
</div>
<?php /**PATH C:\localhost\htdocs\online_helper\resources\views/livewire/customer-orders.blade.php ENDPATH**/ ?>