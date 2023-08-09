@extends('layouts.app')
@section('content')
    <h6 class="mb-0 text-uppercase">shipments</h6>
    <hr>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" onchange="(window.location = this.options[this.selectedIndex].value);">
                        <option value="{{Request::url()}}/?delivered=0" {{$request->delivered == '0' ? 'selected': ''}}>
                            Not delivered
                        </option>
                        <option value="{{Request::url()}}/?delivered=1" {{$request->delivered == '1' ? 'selected': ''}}>
                            delivered
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table mb-0 align-middle">
                <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>Order Id</th>
                    <th>country</th>
                    <th>Deliver date</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($shipments as $shipment)
                    <tr>
                        <th>{{ $shipment->id }}</th>
                        <td>{{ $shipment->order_id }}</td>
                        <td>{{ $shipment->Country->name }}</td>
                        <td>{{ $shipment->deliver_date }}</td>

                        <form method="post" action="{{ route('delivered_order')}}">
                            @csrf
                            @if($request->delivered == 0)
                                <input type="hidden" name="order_id" value="{{ $shipment->order_id }}">
                                <input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
                                <input type="hidden" name="country_id" value="{{ $shipment->country_id }}">
                                <input type="hidden" name="shipping_company_id" value="{{ $shipment->shipping_company_id}}">
                                <td><button type="submit" class="btn btn-primary">Deliver</button></td>
                            @else
                                <td>Delivered</td>
                            @endif
                        </form>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
