<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('public/assets')}}/images/favicon-32x32.png" type="image/png"/>
    <!--plugins-->
    <link href="{{asset('public/assets')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="{{asset('public/assets')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="{{asset('public/assets')}}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
    <!-- loader-->
    <link href="{{asset('public/assets')}}/css/pace.min.css" rel="stylesheet"/>
    <script src="{{asset('public/assets')}}/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('public/assets')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public/assets')}}/css/app.css" rel="stylesheet">
    <link href="{{asset('public/assets')}}/css/icons.css" rel="stylesheet">
    <title>Syndron - Bootstrap5 Admin Template</title>
</head>
<body>
<div class="wrapper">
    <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container">

                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">

                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            <img src="{{asset('public/assets')}}/images/logo-img.png" width="180" alt=""/>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign Up</h3>
                                        <p>Already have an account? <a href="{{route('login')}}">Sign in here</a>
                                        </p>
                                    </div>
                                    <div class="d-grid">
                                        <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span
                                                class="d-flex justify-content-center align-items-center">
                          <img class="me-2" src="{{asset('public/assets')}}/images/icons/search.svg" width="16"
                               alt="Image Description">
                          <span>Sign Up with Google</span>
											</span>
                                        </a> <a href="javascript:;" class="btn btn-facebook"><i
                                                class="bx bxl-facebook"></i>Sign Up with Facebook</a>
                                    </div>
                                    <div class="login-separater text-center mb-4"><span>OR SIGN UP WITH EMAIL</span>
                                        <hr/>
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="col-sm-12">
                                                <label for="inputFirstName" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="inputFirstName" name="name"
                                                       value="{{ old('name') }}" placeholder="Jhon" required
                                                       autocomplete="name" autofocus>

                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" name="email"
                                                       id="inputEmailAddress" value="{{ old('email') }}"
                                                       placeholder="example@user.com">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                           name="password" id="inputChoosePassword"
                                                           placeholder="Enter Password"> <a href="javascript:;"
                                                                                            class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Confirm
                                                    Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                           name="password_confirmation" id="inputChoosePassword"
                                                           placeholder="Confirm Password"> <a href="javascript:;"
                                                                                              class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class='bx bx-user'></i>Sign up
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end row-->
                </div>
        </div>
    </div>
</div>


<script src="{{asset('public/assets')}}/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{asset('public/assets')}}/js/jquery.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
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
<script src="{{asset('public/assets')}}/js/app.js"></script>
</body>


{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body"> --}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf --}}

{{--                        <div class="row mb-3"> --}}
{{--                            <label for="name"--}}
{{--                                   class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label> --}}

{{--                            <div class="col-md-6"> --}}
{{--                                <input id="name" type="text" --}}
{{--                                       class="form-control @error('name') is-invalid @enderror" name="name" --}}
{{--                                       value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email"--}}
{{--                                   class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email"--}}
{{--                                       class="form-control @error('email') is-invalid @enderror" name="email"--}}
{{--                                       value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password"--}}
{{--                                   class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password"--}}
{{--                                       class="form-control @error('password') is-invalid @enderror"--}}
{{--                                       name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password-confirm"--}}
{{--                                   class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6"> --}}
{{--                                <input id="password-confirm" type="password" class="form-control"--}}
{{--                                       name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
