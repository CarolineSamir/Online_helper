@extends('layouts.app')
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
        @foreach($products as $product)
        <div class="col">
            <div class="card">
                <img src="{{asset('/storage/app/public/products/')}}/{{$product->image}}">
                <div class="">
{{--                    <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>--}}
                </div>
                <div class="card-body">
                    <h6 class="card-title cursor-pointer">{{ $product->name }} : {{ $product->description }}</h6>
                    <div class="clearfix">
                        <p class="mb-0 float-start"><strong>{{ $product->amount }}</strong> Amount</p>
                        <p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>{{ $product->price }}</span></p>
                    </div>
                    <div class="d-flex align-items-center mt-3 fs-6">
                        <div class="cursor-pointer">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-secondary"></i>
                        </div>
                        <p class="mb-0 ms-auto">4.2(182)</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
