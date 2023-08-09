<?php $__env->startSection('content'); ?>


    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6  d-flex align-items-center">
                    <h6 class="mb-0 text-uppercase text-primary">Products</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end ">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#new_order"
                       class="btn btn-sm btn-outline-primary d-flex align-items-center justify-content-end">Add New
                        Product</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table mb-0 align-middle">
                <thead class="table-dark">
                <tr>

                    <th class="d-flex align-content-frist">product</th>
                    <th>Category</th>
                    <th>description</th>
                    <th class="t_style">Price</th>
                    <th class="t_style" >Costs</th>
                    <th class="t_style">Taxes</th>
                    <th class="t_style">Amount</th>
                    <th class="t_style">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="recent-product-img">
                                    <img class="recent-product-img" src="<?php echo e(asset('/storage/app/public/products/')); ?>/<?php echo e($product->image); ?>" >
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-1 font-14">    <?php echo e($product->name); ?></h6>
                                </div>
                            </div>
                        </td>
                        <td><?php echo e($product->Category->name); ?></td>
                        <td><?php echo e($product->description); ?></td>
                        <td class="t_style"><div class="mb-1"><?php echo e($product->price); ?></div></td>
                        <td class="t_style"><?php echo e($product->costs); ?></td>
                        <td class="t_style"><?php echo e($product->taxes); ?></td>
                        <td class="t_style"><?php echo e($product->amount); ?></td>
                        <td class="t_style">
                            <form method="post" action="<?php echo e(route('product-delete')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">

                                <div class="d-flex order-actions justify-content-center " style="">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit<?php echo e($product->id); ?>"
                                       class="text-primary">
                                        <i class="fa-solid fa-pen"></i>

                                    </a>
                                    <button value="submit" class="text-danger myButton"
                                            href="<?php echo e(route('company-index')); ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    
                    <div class="modal fade " tabindex="-1" id="edit<?php echo e($product->id); ?>">
                        <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <div class="model-title d-flex align-items-center">
                                        <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Edit product</h5>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="<?php echo e(route('product-update')); ?>"  enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="inputCategory" class="form-label">Category</label>
                                                <select id="inputCategory" class="form-select" name="category_id"
                                                        onchange="newCategory(this.value, 'edit_category')">
                                                    <option selected=""
                                                            value="<?php echo e($product->category_id); ?>"><?php echo e($product->category->name); ?></option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="0">add new</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="display: none;" id="edit_category">
                                                    <label for="inputCategory" class="form-label">add new
                                                        category</label>
                                                    <input type="text" id="inputCategory" class="form-control"
                                                           name="other"
                                                           value="<?php echo e(old('other')); ?>" placeholder="add new">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputName" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="inputName" name="name"
                                                       value="<?php echo e($product->name); ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputDescription" class="form-label">Description</label>
                                                <input type="text" class="form-control" id="inputDescription"
                                                       name="description"
                                                       value="<?php echo e($product->description); ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="inputAmount" class="form-label">Amount</label>
                                                <input type="text" class="form-control" id="inputAmount" name="amount"
                                                       value="<?php echo e($product->amount); ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="inputPrice" class="form-label">Price</label>
                                                <input type="text" class="form-control" id="inputPrice" name="price"
                                                       value="<?php echo e($product->price); ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="inputCosts" class="form-label">Costs</label>
                                                <input type="text" class="form-control" id="inputCosts" name="costs"
                                                       value="<?php echo e($product->costs); ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="inputTaxes" class="form-label">Taxes</label>
                                                <input type="text" class="form-control" id="inputTaxes" name="taxes"
                                                       value="<?php echo e($product->taxes); ?>">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputImg" class="form-label">Add Image</label>
                                                <input type="file" class="form-control" id="inputImg" name="image">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary px-5">Save</button>
                                            </div>
                                        </div>
                                    </form>
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
                            <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary"> products</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <hr>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" method="POST" action="<?php echo e(route('product-add')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-6">
                                <label for="inputCategory" class="form-label">Category</label>
                                <select id="inputCategory" class="form-select" name="category_id"
                                        onchange="newCategory(this.value, 'new_category')">
                                    <option selected="">Choose...</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <option value="0">add new</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div style="display: none;" id="new_category">
                                    <label for="inputCategory" class="form-label">add new category</label>
                                    <input type="text" id="inputCategory" class="form-control" name="other"
                                           value="<?php echo e(old('other')); ?>"
                                           placeholder="add new">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" class="form-control " id="inputName" name="name"
                                       value="<?php echo e(old('name')); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputDescription" class="form-label">Description</label>
                                <input type="text" class="form-control" id="inputDescription" name="description"
                                       required autocomplete="description" value="<?php echo e(old('description')); ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="inputAmount" class="form-label">Amount</label>
                                <input type="text" class="form-control" id="inputAmount" name="amount"
                                       required autocomplete="amount" value="<?php echo e(old('amount')); ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="inputPrice" class="form-label">Price</label>
                                <input type="text" class="form-control" id="inputPrice" name="price"
                                       required autocomplete="price" value="<?php echo e(old('price')); ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="inputCosts" class="form-label">Costs</label>
                                <input type="text" class="form-control" id="inputCosts" name="costs"
                                       required autocomplete="Costs" value="<?php echo e(old('Costs')); ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="inputTaxes" class="form-label">Taxes %</label>
                                <input type="text" class="form-control" id="inputTaxes" name="taxes" placeholder="0%"
                                       required autocomplete="taxes" value="<?php echo e(old('taxes')); ?>"  >
                            </div>
                            <div class="col-md-12">
                                <label for="inputImg" class="form-label">Add Image</label>
                                <input type="file" class="form-control" id="inputImg" name="image">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Save</button>
                                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show" style="display: none" id="error_profit">
                                    <div class="text-white">No budget to buy this product</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
        function newCategory(value, id) {

            if (value == 0) {
                $('#' + id).show();
                // $('#inputCategory')
            } else {
                $('#' + id).hide();
            }
        }

        function checkCosts(){

            var cost = document.getElementById('inputCosts').value;
            var profit = document.getElementById('profits').value
            console.log(cost)
            if (cost > profit){
                $('#error_profit').show();
            }
            else{
                $('#error_profit').hide();
            }
        }
    </script>

<?php $__env->stopPush(); ?>
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
        .recent-product-img {
            display: initial !important;
        }


    </style>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/products/index.blade.php ENDPATH**/ ?>