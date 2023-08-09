@extends('layouts.app')
@section('content')
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bx-cart-alt me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">Orders</h5>
        </div>
        <hr>
        <form class="row g-3" method="POST" action="{{ route('order-add') }}">
            @csrf
            <div class="col-md-6">
                <label for="inputProduct" class="form-label">Products</label>
                <select id="inputProduct" class="form-select" name="product_id">
                    <option selected="">Select product name</option>
                    @foreach($products as $product)--}}
                    <option value="{{ $product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-check-label" for="flexRadioDefault1">Customer</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="customer_type" id="flexRadioDefault2" checked=""
                           onchange="newCustomer(this.value)" value="exits">
                    <label class="form-check-label" for="flexRadioDefault2">Exits Customer</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="customer_type" id="flexRadioDefault1"
                           onchange="newCustomer(this.value)" value="new">
                    <label class="form-check-label" for="flexRadioDefault1">New Customer</label>
                </div>

            </div>

            <div class="col-md-4" id="exits_customer">
                <label for="exitCustomer" class="form-label">Customer</label>
                <select class="form-control" id="exitCustomer" name="customer_id">
                    <option value="">Select Customer name</option>
                    @foreach($customers as $customer)--}}
                    <option value="{{ $customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>

            </div>
            <div id="new_customer" style="display: none">
                <div class="col-md-4" id="">
                    <label for="inputCustomer" class="form-label">Customer</label>
                    <input type="text" class="form-control" id="inputCustomer" name="customer_name" value="{{ old('customer') }}">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <textarea class="form-control" id="inputAddress" placeholder="Address..." rows="3" name="customer_address"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="inputPhone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="inputPhone" name="customer_phone" value="{{ old('phone') }}">
                </div>
            </div>

            <div class="col-md-6">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="text" class="form-control" id="inputPrice"  name="price" value="{{ old('price') }}">
            </div>
            <div class="col-md-6">
                <label for="inputNotes" class="form-label">Notes</label>
                <input type="text" class="form-control" id="inputNotes"  name="notes" value="{{ old('notes') }}">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary px-5">Save</button>
            </div>
        </form>
    </div>

@endsection



@push('script')
    <script>
        function newCustomer(value) {
                console.log(value);
            if (value == 'exits') {
                $("#exits_customer").show();
                $("#new_customer").hide();
            }else{
                $("#exits_customer").hide();
                $("#new_customer").show();
            }

        }
    </script>
@endpush





















{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Order</div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form method="POST" action="{{ route('order-add') }}">--}}
{{--                            @csrf--}}
{{--                            <div class="row mb-3">--}}
{{--                                <label class="col-md-4 col-form-label text-md-center">Product</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <select class="form-control col-md-4 text-md-start" name="product_id">--}}
{{--                                        <option value="">Select product name</option>--}}
{{--                                        @foreach($products as $product)--}}
{{--                                            <option value="{{ $product->id}}">{{$product->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mb-3">--}}
{{--                                <label class="col-md-4 col-form-label text-md-center">customer</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input type="text" class="form-control" name="customer"--}}
{{--                                           value="{{ old('customer') }}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-3">--}}
{{--                                <label class="col-md-4 col-form-label text-md-center">Address</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input type="text" class="form-control" name="address"--}}
{{--                                           value="{{ old('address') }}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-3">--}}
{{--                                <label class="col-md-4 col-form-label text-md-center">Price</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-3">--}}
{{--                                <label class="col-md-4 col-form-label text-md-center">Notes</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input type="text" class="form-control" name="notes" value="{{ old('notes') }}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-0">--}}
{{--                                <div class="col-md-8 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        save--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



{{--@endsection--}}
