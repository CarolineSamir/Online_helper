<?php $__env->startSection('content'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('customer-orders')->html();
} elseif ($_instance->childHasBeenRendered('fIlwBaN')) {
    $componentId = $_instance->getRenderedChildComponentId('fIlwBaN');
    $componentTag = $_instance->getRenderedChildComponentTagName('fIlwBaN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('fIlwBaN');
} else {
    $response = \Livewire\Livewire::mount('customer-orders');
    $html = $response->html();
    $_instance->logRenderedChild('fIlwBaN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php echo \Livewire\Livewire::scripts(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .order-actions a{
            background: #f1f1f100 !important;
            border: none !important;
            margin-right: 11px !important;
        }
        .myButton{
            border: none;
            background: none;
            margin-left: 11px !important;
        }
        .orderButton{
            border: none;
            background: none;
            margin-left: 11px !important;
        }
        button, input, optgroup, select, textarea {
            font-size: large;
        }

    </style>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/customers/index.blade.php ENDPATH**/ ?>