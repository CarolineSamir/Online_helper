<?php $__env->startSection('content'); ?>

    <h6 class="mb-0 text-uppercase">Orders</h6>
    <hr>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" onchange="(window.location = this.options[this.selectedIndex].value);">
                        <option value="<?php echo e(Request::url()); ?>/?statue=0" <?php echo e($request->status == '0' ? 'selected' : ''); ?> >
                            pending
                        </option>
                        <option value="<?php echo e(Request::url()); ?>/?statue=1" <?php echo e($request->status == '1' ? 'selected' : ''); ?>>Out
                            For delivery
                        </option>
                        <option value="<?php echo e(Request::url()); ?>/?statue=2" <?php echo e($request->status == '2' ? 'selected' : ''); ?>>
                            Delivered
                        </option>
                    </select>
                </div>
                <div class="col-md-8 d-flex justify-content-end ">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#new_order"
                       class="btn btn-sm  btn-outline-primary d-flex align-items-center justify-content-end">Add New Orders</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            <table class="table mb-0 align-middle">
                <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>product</th>
                    <th>customer</th>
                    <th>Notes</th>
                    <th class="t_style">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($order->id); ?></th>
                        <td><?php echo e($order->product->name); ?></td>
                        <td><?php echo e($order->customer->name); ?></td>
                        <td><?php echo e($order->notes); ?></td>
                        <td class="d-flex justify-content-center ">
                            <form method="post" action="<?php echo e(route('order-delete')); ?>">
                                <?php echo csrf_field(); ?>
                                <?php if($order->status == 0): ?>
                                    <div class="d-flex order-actions " style="">
                                        <input type="hidden" name="id" value="<?php echo e($order->id); ?>">

                                        <a id="ship" href="<?php echo e(route('shipment-new', $order->id)); ?>" title="ship"
                                           class="text-dark"><i class="fa-solid fa-truck"></i></a>
                                        <a class="text-primary" href="#" data-bs-toggle="modal"
                                           data-bs-target="#edit<?php echo e($order->id); ?>" title="edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <button value="submit" class="text-danger myButton"
                                                href="<?php echo e(route('order-delete')); ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>

                                <?php elseif($order->status == 1): ?>
                                    <a id="ship" href="#" data-bs-toggle="modal" data-bs-target="#order_<?php echo e($order->id); ?>"

                                       class=" btn btn-sm btn-secondary">delivery statues</a>
                                <?php else: ?>
                                    
                                    Delivered
                                <?php endif; ?>
                            </form>
                        </td>
                    </tr>


                    
                    <div class="container ">
                        <div class="modal fade " tabindex="-1" id="edit<?php echo e($order->id); ?>">

                            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <div class="model-title d-flex align-items-center">
                                            <div><i class="bx bx-cart-alt me-1 font-22 text-primary"></i>
                                            </div>
                                            <h5 class="mb-0 text-primary">Orders</h5>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        <hr>
                                    </div>
                                    <div class="modal-body">
                                        <form style="margin-left:0" method="POST" action="<?php echo e(route('order-update')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($order->id); ?>">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="inputProduct" class="form-label">Products</label>
                                                    <select id="inputProduct" class="form-select" name="product_id">
                                                        <option
                                                            value="<?php echo e($order->product_id); ?>"><?php echo e($order->product->name); ?></option>
                                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option
                                                                value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-check-label"
                                                           for="flexRadioDefault1">Customer</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="customer_type"
                                                               id="flexRadioDefault2" checked=""
                                                               onchange="editCustomer(this.value)" value="exits">
                                                        <label class="form-check-label" for="flexRadioDefault2">Exits
                                                            Customer</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="customer_type"
                                                               id="flexRadioDefault1"
                                                               onchange="editCustomer(this.value)" value="new">
                                                        <label class="form-check-label" for="flexRadioDefault1">New
                                                            Customer</label>
                                                    </div>
                                                </div>
                                                <div class="row  g-3">
                                                    <div class="col-md-6" id="edit_exits_customer">
                                                        <label for="exitCustomer" class="form-label">Customer</label>
                                                        <select class="form-control" id="exitCustomer"
                                                                name="customer_id">
                                                            <option
                                                                value="<?php echo e($order->customer->id); ?>"><?php echo e($order->customer->name); ?></option>
                                                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                    value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                                    </div>
                                                    <div class="row  g-3" id="add_new_customer" style="display: none">
                                                        <div class="col-md-6" id="">
                                                            <label for="inputCustomer"
                                                                   class="form-label">Customer</label>
                                                            <input type="text" class="form-control" id="inputCustomer"
                                                                   name="customer_name"
                                                                   value="<?php echo e(old('customer')); ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputPhone" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" id="inputPhone"
                                                                   name="customer_phone"
                                                                   value="<?php echo e(old('phone')); ?>">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputAddress" class="form-label">Address</label>
                                                            <input class="form-control" id="inputAddress"
                                                                   placeholder="Address..."
                                                                   name="customer_address"
                                                                   value="<?php echo e(old('customer_address')); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="inputNotes" class="form-label">Notes</label>
                                                        <input type="text" class="form-control" id="inputNotes"
                                                               name="notes"
                                                               value="<?php echo e($order->notes); ?>">
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary px-5">Save
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
 
                    <div class="container ">
                        <div class="modal fade " tabindex="-1" id="order_<?php echo e($order->id); ?>">
                            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <div class="model-title d-flex align-items-center">
                                            <div><i class="bx bx-cart-alt me-1 font-22 text-primary"></i>
                                            </div>
                                            <h5 class="mb-0 text-primary">Orders</h5>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <hr>
                                    </div>
                                    <div class="modal-body">
                                        <p>Modal body text goes here.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>


    
    <div class="container ">
        <div class="modal fade " tabindex="-1" id="new_order">
            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                <div class="modal-content ">
                    <div class="modal-header">
                        <div class="model-title d-flex align-items-center">
                            <div><i class="bx bx-cart-alt me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Orders</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <hr>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" style="margin-left:0" method="POST" action="<?php echo e(route('order-add')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-6">
                                <label for="inputProduct" class="form-label">Products</label>
                                <select id="inputProduct" class="form-select" name="product_id" required autocomplete="product_id">
                                    <option selected="">Select product name</option>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>--}}
                                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-check-label" for="flexRadioDefault1">Customer</label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="customer_type"
                                           id="flexRadioDefault2" checked=""
                                           onchange="newCustomer(this.value)" value="exits">
                                    <label class="form-check-label" for="flexRadioDefault2">Exits Customer</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="customer_type"
                                           id="flexRadioDefault1"
                                           onchange="newCustomer(this.value)" value="new">
                                    <label class="form-check-label" for="flexRadioDefault1">New Customer</label>
                                </div>
                            </div>
                            <div class="row  g-3">
                                <div class="col-md-6" id="exits_customer">
                                    <label for="exitCustomer" class="form-label">Customer</label>
                                    <select class="form-control" id="exitCustomer" name="customer_id">
                                        <option value="">Select Customer name</option>
                                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>--}}
                                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                <div class="row  g-3" id="new_customer" style="display: none">
                                    <div class="col-md-6" id="">
                                        <label for="inputCustomer" class="form-label">Customer</label>
                                        <input type="text" class="form-control" id="inputCustomer" name="customer_name"
                                               value="<?php echo e(old('customer')); ?>">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPhone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="inputPhone" name="customer_phone"
                                                  value="<?php echo e(old('phone')); ?>">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Address</label>
                                        <input class="form-control" id="inputAddress" placeholder="Address..."
                                                  name="customer_address" value="<?php echo e(old('customer_address')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputNotes" class="form-label">Notes</label>
                                    <input type="text" class="form-control" id="inputNotes" name="notes"
                                           value="<?php echo e(old('notes')); ?>">
                                </div>

                                <div class="col-12">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary px-5">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        function newCustomer(value) {
            console.log(value);
            if (value == 'exits') {
                $("#exits_customer").show();
                $("#new_customer").hide();
            } else {
                $("#exits_customer").hide();
                $("#new_customer").show();
            }

        }

        function editCustomer(value) {
            console.log(value);
            if (value == 'exits') {
                $("#edit_exits_customer").show();
                $("#add_new_customer").hide();
            } else {
                $("#edit_exits_customer").hide();
                $("#add_new_customer").show();
            }

        }
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .row {
            margin-right: 0;
        !important;
            margin-left: 0;
        !important;
        }

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


    </style>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/orders/index.blade.php ENDPATH**/ ?>