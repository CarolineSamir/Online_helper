<!doctype html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{Session::get('direction')}}" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">

<!-- CSRF Token -->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('public/assets')}}/images/favicon-32x32.png" type="image/png"/>
    <!--plugins-->
    <link href="{{asset('public/assets')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="{{asset('public/assets')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="{{asset('public/assets')}}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{asset('public/assets')}}/plugins/notifications/css/lobibox.min.css" />

    <!-- loader-->
    <link href="{{asset('public/assets')}}/css/pace.min.css" rel="stylesheet"/>
    <script src="{{asset('public/assets')}}/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('public/assets')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public/assets')}}/css/app.css" rel="stylesheet">
    <link href="{{asset('public/assets')}}/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/dark-theme.css"/>
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/semi-dark.css"/>
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/header-colors.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    @if(App::isLocale('ar'))
        <link href="{{asset('public/syndron')}}/css/rtl/rtl.css" rel="stylesheet">
        <link href="{{asset('public/syndron')}}/css/rtl/app.css" rel="stylesheet">
    @else
        <link href="{{asset('public/syndron')}}/css/ltr/ltr.css" rel="stylesheet">
    @endif
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

    @include('layouts.partials._header')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <div class="main-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials._footer')
</div>


<!--end wrapper-->
<script src="{{asset('public/assets')}}/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{asset('public/assets')}}/js/jquery.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--app JS-->

<script src="{{asset('public/assets')}}/plugins/notifications/js/lobibox.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/notifications/js/notifications.min.js"></script>

<script src="{{asset('public/assets')}}/js/app.js"></script>



<script>
    window.onload = function() {
        @if(session('error'))
            error("{!! session('error') !!}");
        @endif

        @if(session('success'))
            success("{!! session('success') !!}");
        @endif

        @if(session('info'))
            info("{!! session('info') !!}");
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                error("{{$error}}");
            @endforeach
        @endif
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




@stack('script')
@stack('style')
</body>
</html>


{{--<ul class="navbar-nav ms-auto">--}}
{{--    <!-- Authentication Links -->--}}
{{--    @guest--}}
{{--        @if (Route::has('login'))--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        @if (Route::has('register'))--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--    @else--}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                {{ Auth::user()->name }}--}}
{{--            </a>--}}

{{--            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                    {{ __('Logout') }}--}}
{{--                </a>--}}

{{--                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                    @csrf--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--    @endguest--}}
{{--</ul>--}}
