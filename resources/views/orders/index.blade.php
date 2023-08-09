@extends('layouts.app')
@section('content')

    <h6 class="mb-0 text-uppercase">Orders</h6>
    <hr>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" onchange="(window.location = this.options[this.selectedIndex].value);">
                        <option value="{{Request::url()}}/?statue=0" {{$request->status == '0' ? 'selected' : ''}} >
                            pending
                        </option>
                        <option value="{{Request::url()}}/?statue=1" {{$request->status == '1' ? 'selected' : ''}}>Out
                            For delivery
                        </option>
                        <option value="{{Request::url()}}/?statue=2" {{$request->status == '2' ? 'selected' : ''}}>
                            Delivered
                        </option>
                    </select>
                </div>
                <div class="col-md-8 d-flex justify-content-end ">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#new_order"
                       class="btn btn-sm  btn-outline-primary d-flex align-items-center justify-content-end">Add New Orders</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{--view orders--}}
            <table class="table mb-0 align-middle">
                <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>product</th>
                    <th>customer</th>
                    <th>Notes</th>
                    <th class="t_style">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th>{{ $order->id }}</th>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->notes}}</td>
                        <td class="d-flex justify-content-center ">
                            <form method="post" action="{{ route('order-delete')}}">
                                @csrf
                                @if($order->status == 0)
                                    <div class="d-flex order-actions " style="">
                                        <input type="hidden" name="id" value="{{ $order->id}}">

                                        <a id="ship" href="{{ route('shipment-new', $order->id) }}" title="ship"
                                           class="text-dark"><i class="fa-solid fa-truck"></i></a>
                                        <a class="text-primary" href="#" data-bs-toggle="modal"
                                           data-bs-target="#edit{{$order->id}}" title="edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <button value="submit" class="text-danger myButton"
                                                href="{{route('order-delete')}}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>

                                @elseif($order->status == 1)
                                    <a id="ship" href="#" data-bs-toggle="modal" data-bs-target="#order_{{$order->id}}"

                                       class=" btn btn-sm btn-secondary">delivery statues</a>
                                @else
                                    {{--<a id="ship" href="{{ route('shipment-new', $order->id) }}" class="btn btn-sm btn-success" >deliver</a>--}}
                                    Delivered
                                @endif
                            </form>
                        </td>
                    </tr>


                    {{--edit order--}}
                    <div class="container ">
                        <div class="modal fade " tabindex="-1" id="edit{{$order->id}}">

                            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <div class="model-title d-flex align-items-center">
                                            <div><i class="bx bx-cart-alt me-1 font-22 text-primary"></i>
                                            </div>
                                            <h5 class="mb-0 text-primary">Orders</h5>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        <hr>
                                    </div>
                                    <div class="modal-body">
                                        <form style="margin-left:0" method="POST" action="{{ route('order-update') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $order->id }}">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="inputProduct" class="form-label">Products</label>
                                                    <select id="inputProduct" class="form-select" name="product_id">
                                                        <option
                                                            value="{{$order->product_id}}">{{$order->product->name}}</option>
                                                        @foreach($products as $product)
                                                            <option
                                                                value="{{ $product->id}}">{{$product->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-check-label"
                                                           for="flexRadioDefault1">Customer</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="customer_type"
                                                               id="flexRadioDefault2" checked=""
                                                               onchange="editCustomer(this.value)" value="exits">
                                                        <label class="form-check-label" for="flexRadioDefault2">Exits
                                                            Customer</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="customer_type"
                                                               id="flexRadioDefault1"
                                                               onchange="editCustomer(this.value)" value="new">
                                                        <label class="form-check-label" for="flexRadioDefault1">New
                                                            Customer</label>
                                                    </div>
                                                </div>
                                                <div class="row  g-3">
                                                    <div class="col-md-6" id="edit_exits_customer">
                                                        <label for="exitCustomer" class="form-label">Customer</label>
                                                        <select class="form-control" id="exitCustomer"
                                                                name="customer_id">
                                                            <option
                                                                value="{{$order->customer->id}}">{{$order->customer->name}}</option>
                                                            @foreach($customers as $customer)
                                                                <option
                                                                    value="{{ $customer->id}}">{{$customer->name}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="row  g-3" id="add_new_customer" style="display: none">
                                                        <div class="col-md-6" id="">
                                                            <label for="inputCustomer"
                                                                   class="form-label">Customer</label>
                                                            <input type="text" class="form-control" id="inputCustomer"
                                                                   name="customer_name"
                                                                   value="{{ old('customer') }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputPhone" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" id="inputPhone"
                                                                   name="customer_phone"
                                                                   value="{{ old('phone') }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputAddress" class="form-label">Address</label>
                                                            <input class="form-control" id="inputAddress"
                                                                   placeholder="Address..."
                                                                   name="customer_address"
                                                                   value="{{ old('customer_address') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="inputNotes" class="form-label">Notes</label>
                                                        <input type="text" class="form-control" id="inputNotes"
                                                               name="notes"
                                                               value="{{ $order->notes }}">
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary px-5">Save
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
 {{--deleivery statues--}}
                    <div class="container ">
                        <div class="modal fade " tabindex="-1" id="order_{{$order->id}}">
                            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <div class="model-title d-flex align-items-center">
                                            <div><i class="bx bx-cart-alt me-1 font-22 text-primary"></i>
                                            </div>
                                            <h5 class="mb-0 text-primary">Orders</h5>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <hr>
                                    </div>
                                    <div class="modal-body">
                                        <p>Modal body text goes here.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{--    new order--}}
    <div class="container ">
        <div class="modal fade " tabindex="-1" id="new_order">
            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                <div class="modal-content ">
                    <div class="modal-header">
                        <div class="model-title d-flex align-items-center">
                            <div><i class="bx bx-cart-alt me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Orders</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <hr>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" style="margin-left:0" method="POST" action="{{ route('order-add') }}">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputProduct" class="form-label">Products</label>
                                <select id="inputProduct" class="form-select" name="product_id" required autocomplete="product_id">
                                    <option selected="">Select product name</option>
                                    @foreach($products as $product)--}}
                                    <option value="{{ $product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-check-label" for="flexRadioDefault1">Customer</label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="customer_type"
                                           id="flexRadioDefault2" checked=""
                                           onchange="newCustomer(this.value)" value="exits">
                                    <label class="form-check-label" for="flexRadioDefault2">Exits Customer</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="customer_type"
                                           id="flexRadioDefault1"
                                           onchange="newCustomer(this.value)" value="new">
                                    <label class="form-check-label" for="flexRadioDefault1">New Customer</label>
                                </div>
                            </div>
                            <div class="row  g-3">
                                <div class="col-md-6" id="exits_customer">
                                    <label for="exitCustomer" class="form-label">Customer</label>
                                    <select class="form-control" id="exitCustomer" name="customer_id">
                                        <option value="">Select Customer name</option>
                                        @foreach($customers as $customer)--}}
                                        <option value="{{ $customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="row  g-3" id="new_customer" style="display: none">
                                    <div class="col-md-6" id="">
                                        <label for="inputCustomer" class="form-label">Customer</label>
                                        <input type="text" class="form-control" id="inputCustomer" name="customer_name"
                                               value="{{ old('customer') }}">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPhone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="inputPhone" name="customer_phone"
                                                  value="{{ old('phone') }}">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Address</label>
                                        <input class="form-control" id="inputAddress" placeholder="Address..."
                                                  name="customer_address" value="{{ old('customer_address') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputNotes" class="form-label">Notes</label>
                                    <input type="text" class="form-control" id="inputNotes" name="notes"
                                           value="{{ old('notes') }}">
                                </div>

                                <div class="col-12">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary px-5">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        function newCustomer(value) {
            console.log(value);
            if (value == 'exits') {
                $("#exits_customer").show();
                $("#new_customer").hide();
            } else {
                $("#exits_customer").hide();
                $("#new_customer").show();
            }

        }

        function editCustomer(value) {
            console.log(value);
            if (value == 'exits') {
                $("#edit_exits_customer").show();
                $("#add_new_customer").hide();
            } else {
                $("#edit_exits_customer").hide();
                $("#add_new_customer").show();
            }

        }
    </script>
@endpush

@push('style')
    <style>
        .row {
            margin-right: 0;
        !important;
            margin-left: 0;
        !important;
        }

        .order-actions a {
            background: #f1f1f100 !important;
            border: none !important;
            margin-right: 11px !important;
        }

        .myButton {
            border: none;
            background: none;
            margin-left: 11px !important;
        }

        button, input, optgroup, select, textarea {
            font-size: large;

        }


    </style>
@endpush

