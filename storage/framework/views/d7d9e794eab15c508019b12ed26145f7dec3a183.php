<?php $__env->startSection('content'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('country-wire')->html();
} elseif ($_instance->childHasBeenRendered('w2Zabbu')) {
    $componentId = $_instance->getRenderedChildComponentId('w2Zabbu');
    $componentTag = $_instance->getRenderedChildComponentTagName('w2Zabbu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('w2Zabbu');
} else {
    $response = \Livewire\Livewire::mount('country-wire');
    $html = $response->html();
    $_instance->logRenderedChild('w2Zabbu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\localhost\htdocs\online_helper\resources\views/countries/index.blade.php ENDPATH**/ ?>