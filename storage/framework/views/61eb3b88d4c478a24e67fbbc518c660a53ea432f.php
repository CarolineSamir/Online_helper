<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo e(asset('public/assets')); ?>/images/favicon-32x32.png" type="image/png"/>
    <!--plugins-->
    <link href="<?php echo e(asset('public/assets')); ?>/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets')); ?>/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets')); ?>/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
    <!-- loader-->
    <link href="<?php echo e(asset('public/assets')); ?>/css/pace.min.css" rel="stylesheet"/>
    <script src="<?php echo e(asset('public/assets')); ?>/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo e(asset('public/assets')); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets')); ?>/css/app.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets')); ?>/css/icons.css" rel="stylesheet">
    <title>Syndron - Bootstrap5 Admin Template</title>
    <script>
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload = function (){null;}
    </script>
</head>

<body class="bg-login">
<!--wrapper-->
<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        <img src="<?php echo e(asset('public/assets')); ?>/images/logo-img.png" width="180" alt=""/>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Sign in</h3>
                                    <p>Don't have an account yet? <a href="<?php echo e(route('register')); ?>">Sign up here</a>
                                    </p>
                                </div>
                                <div class="d-grid">
                                    <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span
                                            class="d-flex justify-content-center align-items-center">
                          <img class="me-2" src="<?php echo e(asset('public/assets')); ?>/images/icons/search.svg" width="16"
                               alt="Image Description">
                          <span>Sign in with Google</span>
											</span>
                                    </a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Sign
                                        in with Facebook</a>
                                </div>
                                <div class="login-separater text-center mb-4"><span>OR SIGN IN WITH EMAIL</span>
                                    <hr/>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" method="POST" action="<?php echo e(route('login')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputEmailAddress"
                                                   placeholder="Email Address" name="email" value="<?php echo e(old('email')); ?>"
                                                   required autocomplete="email" autofocus>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control border-end-0"
                                                       id="inputChoosePassword" name="password" <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>  required autocomplete="current-password"
                                                       placeholder="Enter Password"> <a href="javascript:;"
                                                                                        class="input-group-text bg-transparent"><i
                                                        class='bx bx-hide'></i></a>
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                       id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end"><a href="authentication-forgot-password.html">Forgot
                                                Password ?</a>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bx bxs-lock-open"></i>Sign in
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="<?php echo e(asset('public/assets')); ?>/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?php echo e(asset('public/assets')); ?>/js/jquery.min.js"></script>
<script src="<?php echo e(asset('public/assets')); ?>/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo e(asset('public/assets')); ?>/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?php echo e(asset('public/assets')); ?>/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>

<!--app JS-->
<script src="<?php echo e(asset('public/assets')); ?>/js/app.js"></script>
</body>

</html>








































































<?php /**PATH C:\localhost\htdocs\online_helper\resources\views/auth/login.blade.php ENDPATH**/ ?>