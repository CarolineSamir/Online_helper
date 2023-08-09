@extends('layouts.app')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 bg-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Revenue</p>
                            <h4 class="my-1 text-white">${{$revenues->sum('profits')}}</h4>
                            {{--                                <p class="mb-0 font-13 text-white"><i class="bx bxs-up-arrow align-middle"></i>$34 from last week</p>--}}
                        </div>
                        <div class="widgets-icons bg-white text-success ms-auto"><i class="bx bxs-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-primary bg-gradient">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Total Orders</p>
                            <h4 class="my-1 text-white">{{$orders->count()}}</h4>
                        </div>
                        <div class="text-white ms-auto font-35"><i class="bx bx-cart-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <a class="card radius-10 bg-danger bg-gradient" href="{{route('revenue-index')}}">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Total Income</p>
                            <h4 class="my-1 text-white">$89,245</h4>
                        </div>
                        <div class="text-white ms-auto font-35"><i class="bx bx-dollar"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <div class="card radius-10 bg-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-dark">Total Customers</p>
                            <h4 class="my-1 text-dark">{{$customers->count()}}</h4>
                            {{--                            <p class="mb-0 font-13 text-dark"><i class="bx bxs-up-arrow align-middle"></i>$24 from last week</p>--}}
                        </div>
                        <div class="widgets-icons bg-white text-dark ms-auto"><i class="bx bxs-group"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
@push('script')
    {{--    <script>--}}
    {{--        function preventBack(){window.history.forward()};--}}
    {{--        setTimeout("preventBack()",0);--}}
    {{--        window.onunload = function (){null;}--}}
    {{--    </script>--}}
@endpush



{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
