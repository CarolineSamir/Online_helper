<!doctype html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(Session::get('direction')); ?>" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">

<!-- CSRF Token -->

<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo e(asset('public/assets')); ?>/images/favicon-32x32.png" type="image/png"/>
    <!--plugins-->
    <link href="<?php echo e(asset('public/assets')); ?>/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets')); ?>/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets')); ?>/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="<?php echo e(asset('public/assets')); ?>/plugins/notifications/css/lobibox.min.css" />

    <!-- loader-->
    <link href="<?php echo e(asset('public/assets')); ?>/css/pace.min.css" rel="stylesheet"/>
    <script src="<?php echo e(asset('public/assets')); ?>/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo e(asset('public/assets')); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets')); ?>/css/app.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets')); ?>/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets')); ?>/css/dark-theme.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets')); ?>/css/semi-dark.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets')); ?>/css/header-colors.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <?php if(App::isLocale('ar')): ?>
        <link href="<?php echo e(asset('public/syndron')); ?>/css/rtl/rtl.css" rel="stylesheet">
        <link href="<?php echo e(asset('public/syndron')); ?>/css/rtl/app.css" rel="stylesheet">
    <?php else: ?>
        <link href="<?php echo e(asset('public/syndron')); ?>/css/ltr/ltr.css" rel="stylesheet">
    <?php endif; ?>
    <style>
        /*th{*/
        /*    text-align: center;*/
        /*}*/
        /*td{*/
        /*    text-align: center;*/
        /*}*/
        .t_style{
            text-align: center;

        }
        .order-actions a {
            background: #f1f1f100 !important;
            border: none !important;
            margin-right: 11px !important;

        }

        .orderButton{
            border: none;
            background: none;
            margin-left: 11px !important;
        }
        .div{
            text-align: center;
        }
        .myButton {
            border: none;
            background: none;
            margin-left: 11px !important;
        }
    </style>
</head>

<body>
<!--wrapper-->
<div class="wrapper">

    <?php echo $__env->make('layouts.partials._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <div class="main-body">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('layouts.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


<!--end wrapper-->
<script src="<?php echo e(asset('public/assets')); ?>/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?php echo e(asset('public/assets')); ?>/js/jquery.min.js"></script>
<script src="<?php echo e(asset('public/assets')); ?>/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo e(asset('public/assets')); ?>/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?php echo e(asset('public/assets')); ?>/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--app JS-->

<script src="<?php echo e(asset('public/assets')); ?>/plugins/notifications/js/lobibox.min.js"></script>
<script src="<?php echo e(asset('public/assets')); ?>/plugins/notifications/js/notifications.min.js"></script>

<script src="<?php echo e(asset('public/assets')); ?>/js/app.js"></script>



<script>
    window.onload = function() {
        <?php if(session('error')): ?>
            error("<?php echo session('error'); ?>");
        <?php endif; ?>

        <?php if(session('success')): ?>
            success("<?php echo session('success'); ?>");
        <?php endif; ?>

        <?php if(session('info')): ?>
            info("<?php echo session('info'); ?>");
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                error("<?php echo e($error); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    };



    function error(msg) {
        Lobibox.notify('error', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'right button',
            showClass: 'rollIn',
            hideClass: 'rollOut',
            // icon: 'bx bx-x-circle',
            size: 'mini',
            msg: msg
        });
    }

    function success(msg) {
        Lobibox.notify('success', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'right top',
            showClass: 'rollIn',
            hideClass: 'rollOut',
            // icon: 'bx bx-check-circle',
            size: 'mini',
            msg: msg
        });
    }

    function info(msg) {
        Lobibox.notify('info', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'right button',
            showClass: 'rollIn',
            hideClass: 'rollOut',
            icon: 'bx bx-info-circle',
            size: 'mini',
            msg: msg
        });
    }

</script>




<?php echo $__env->yieldPushContent('script'); ?>
<?php echo $__env->yieldPushContent('style'); ?>
</body>
</html>




































<?php /**PATH C:\localhost\htdocs\online_helper\resources\views/layouts/app.blade.php ENDPATH**/ ?>