@extends('layouts.app')
@section('content')
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bx-cart-alt me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">Orders</h5>
        </div>
        <hr>
        <form class="row g-3" method="POST" action="{{ route('order-update') }}">
            @csrf
            <input type="hidden" name="id" value="{{$order->id}}">
            <div class="col-md-6">
                <label for="inputProduct" class="form-label">Products</label>
                <select id="inputProduct" class="form-select" name="product_id">
                    <option selected="" value="{{$order->product_id}}">{{$order->product->name}}</option>
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
                    <option value="{{$order->customer->id}}">{{$order->customer->name}}</option>
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
                    <input type="text" class="form-control" id="inputPhone" name="customer_phone" value="{{ $order->phone }}">
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputNotes" class="form-label">Notes</label>
                <input type="text" class="form-control" id="inputNotes"  name="notes" value="{{ $order->notes }}">
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
