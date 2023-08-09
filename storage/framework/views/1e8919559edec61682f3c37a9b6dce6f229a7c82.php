<?php $__env->startSection('content'); ?>
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary"> products</h5>
        </div>
        <hr>
        <div class="card-body">
            <form class="row g-3" method="POST" action="<?php echo e(route('product-update')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                <div class="col-md-6">
                    <label for="inputCategory" class="form-label">Category</label>
                    <select id="inputCategory" class="form-select" name="category_id" onchange="newCategory(this.value)">
                        <option selected="" value="<?php echo e($product->category_id); ?>"><?php echo e($product->category->name); ?></option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <option value="0" >add new</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div  style="display: none;" id="category">
                        <label for="inputCategory" class="form-label">add new category</label>
                        <input type="text" id="inputCategory" class="form-control" name="other" value="<?php echo e(old('other')); ?>" placeholder="add new">

                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="<?php echo e($product->name); ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputDescription" class="form-label">Description</label>
                    <input type="text" class="form-control" id="inputDescription" name="description"
                           value="<?php echo e($product->description); ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputAmount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="inputAmount"  name="amount" value="<?php echo e($product->amount); ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input type="text" class="form-control" id="inputPrice"  name="price" value="<?php echo e($product->price); ?>">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        function newCategory(value) {

            if (value == 0) {
                $('#category').show();
                // $('#inputCategory')
            }else {
                $('#category').hide();
            }
        }
    </script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/products/edit.blade.php ENDPATH**/ ?>