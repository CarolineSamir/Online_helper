<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4  d-flex align-items-center">
                            <h6 class="mb-0 text-uppercase text-primary">Categories</h6>
                        </div>
                        <div class="col-md-8 d-flex justify-content-end ">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#new_category"
                               class="btn btn-sm btn-outline-primary d-flex align-items-center justify-content-end">
                                Add New Category
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table mb-0">
                        <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th class="t_style">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($categories->count() > 0): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr style="  <?php echo e($cat_id == $category->id ? 'background-color: rgba(128,128,128,0.21) ': ''); ?> ">
                                    <th wire:click="viewProduct(<?php echo e($category->id); ?>)"><?php echo e($category->id); ?></th>
                                    <td wire:click="viewProduct(<?php echo e($category->id); ?>)"><?php echo e($category->name); ?></td>
                                    <td class="d-flex justify-content-center">
                                        <div class="d-flex order-actions ">
                                            <div class="d-flex order-actions " style="">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#edit<?php echo e($category->id); ?>"
                                                   class="text-primary">
                                                    <i class="fa-solid fa-pen"></i>
                                                    <input type="hidden" name="product_id" value="">
                                                </a>
                                                <button class="text-danger myButton"
                                                        wire:click="delete(<?php echo e($category->id); ?>)">
                                                    <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <form id="edit_category_<?php echo e($category->id); ?>">
                                    <div class="container">
                                        <div class="modal fade " tabindex="-1" id="edit<?php echo e($category->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <div class="model-title d-flex align-items-center">
                                                            <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                                                            </div>
                                                            <h5 class="mb-0 text-primary">edit Category</h5>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="id" value="<?php echo e($category->id); ?>">

                                                                <label for="inputName" class="form-label">Category</label>

                                                                <input type="text" class="form-control" name="name" value="<?php echo e($category->name); ?>">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <a  class="btn btn-primary px-5"
                                                                        onclick="edit(<?php echo e($category->id); ?>)"
                                                                wire:click=$emit('refreshCategory')>Save
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

        <div class="col-lg-6" id="product-list">
            <div class="card">
                <div class="card-header">
                    <div class="row" style="margin:6px -8px !important;">
                        <div class="col-md-4  d-flex align-items-center">
                            <h6 class="mb-0 text-uppercase text-primary">Products</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                 
                    <?php if($err): ?>
                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white"><?php echo e($err); ?></div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php ($this->err = null); ?>
                    <?php endif; ?>
                    <?php if($products != null): ?>
                        <table class="table mb-0">
                            <thead class="table-dark">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th class="t_style">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($product->id); ?></th>
                                    <td><?php echo e($product->name); ?></td>
                                    <td class="t_style"><?php echo e($product->amount); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="modal fade " tabindex="-1" id="new_category">
            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                <div class="modal-content ">
                    <div class="modal-header">
                        <div class="model-title d-flex align-items-center">
                            <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Add Category</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo e(route('category-add')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="inputName" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                           value="<?php echo e(old('category')); ?>">
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
    </div>

    <?php $__env->startPush('script'); ?>
        <script>
            function edit(id){
                var edit_category =  $('#edit_category_'+id).serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.post({
                    url: '<?php echo e(route('category-update')); ?>',
                    data: edit_category,
                    success: function (data) {
                        success("updated !!");
                        Livewire.emit('refreshCategory');
                        $('#edit'+id).modal('hide');
                    },
                    error: function (data) {
                        error("Error updating category")
                    }
                });
            }
        </script>
    <?php $__env->stopPush(); ?>
</div>

















<?php /**PATH C:\localhost\htdocs\online_helper\resources\views/livewire/product.blade.php ENDPATH**/ ?>