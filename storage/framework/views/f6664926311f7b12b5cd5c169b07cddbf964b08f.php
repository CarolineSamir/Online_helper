<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <h6 class="mb-0 text-uppercase">Categories</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">
                        <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($category->id); ?></th>
                                <td><?php echo e($category->name); ?></td>
                                    <td>

                                        <button  onclick="(window.location= this.value)"
                                                 value=<?php echo e($request->id == $category->id); ?>

                                                 <?php dd($category->id); ?>
                                                 type="button" class="btn btn-outline-primary">view products</button>
                                        <input type="hidden" value="<?php echo e($category->id); ?>" name="id">
                                    </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6" id="product-list" style="display: none">
            <h6 class="mb-0 text-uppercase">Categories</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">
                        <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Name</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($product->id); ?></th>
                                <td><?php echo e($product->name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        function productView() {
          var value = document.getElementById("product-list")
            if (value.style.display === 'none') {
                value.style.display = 'block';
            }else{
                value.style.display = 'none';
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/products/category.blade.php ENDPATH**/ ?>