<?php $__env->startSection('content'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('product')->html();
} elseif ($_instance->childHasBeenRendered('xDywJ3C')) {
    $componentId = $_instance->getRenderedChildComponentId('xDywJ3C');
    $componentTag = $_instance->getRenderedChildComponentTagName('xDywJ3C');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('xDywJ3C');
} else {
    $response = \Livewire\Livewire::mount('product');
    $html = $response->html();
    $_instance->logRenderedChild('xDywJ3C', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

        }
        button, input, optgroup, select, textarea {
            font-size: large;
        }

    </style>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/categories/index.blade.php ENDPATH**/ ?>