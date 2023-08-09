<?php $__env->startSection('content'); ?>
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bx-cart-alt me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">Orders</h5>
        </div>
        <hr>
        <form class="row g-3" method="POST" action="<?php echo e(route('order-add')); ?>">
            <?php echo csrf_field(); ?>
            <div class="col-md-6">
                <label for="inputProduct" class="form-label">Products</label>
                <select id="inputProduct" class="form-select" name="product_id">
                    <option selected="">Select product name</option>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>--}}
                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-check-label" for="flexRadioDefault1">Customer</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="customer_type" id="flexRadioDefault2" checked=""
                           onchange="newCustomer(this.value)" value="exits">
                    <label class="form-check-label" for="flexRadioDefault2">Exits Customer</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="customer_type" id="flexRadioDefault1"
                           onchange="newCustomer(this.value)" value="new">
                    <label class="form-check-label" for="flexRadioDefault1">New Customer</label>
                </div>

            </div>

            <div class="col-md-4" id="exits_customer">
                <label for="exitCustomer" class="form-label">Customer</label>
                <select class="form-control" id="exitCustomer" name="customer_id">
                    <option value="">Select Customer name</option>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>--}}
                    <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div>
            <div id="new_customer" style="display: none">
                <div class="col-md-4" id="">
                    <label for="inputCustomer" class="form-label">Customer</label>
                    <input type="text" class="form-control" id="inputCustomer" name="customer_name" value="<?php echo e(old('customer')); ?>">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <textarea class="form-control" id="inputAddress" placeholder="Address..." rows="3" name="customer_address"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="inputPhone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="inputPhone" name="customer_phone" value="<?php echo e(old('phone')); ?>">
                </div>
            </div>

            <div class="col-md-6">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="text" class="form-control" id="inputPrice"  name="price" value="<?php echo e(old('price')); ?>">
            </div>
            <div class="col-md-6">
                <label for="inputNotes" class="form-label">Notes</label>
                <input type="text" class="form-control" id="inputNotes"  name="notes" value="<?php echo e(old('notes')); ?>">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary px-5">Save</button>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>



<?php $__env->startPush('script'); ?>
    <script>
        function newCustomer(value) {
                console.log(value);
            if (value == 'exits') {
                $("#exits_customer").show();
                $("#new_customer").hide();
            }else{
                $("#exits_customer").hide();
                $("#new_customer").show();
            }

        }
    </script>
<?php $__env->stopPush(); ?>



























































































<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/orders/new.blade.php ENDPATH**/ ?>