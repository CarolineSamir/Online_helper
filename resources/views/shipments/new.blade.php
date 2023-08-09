@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('shipment-add') }}">
        @csrf
        <input type="hidden" name="order_id" value="{{$order->id}}">

        <div class="card p-5">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
                <h5 class="mb-0 text-primary">Order {{ $order->id }}</h5>
            </div>
            <hr>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="inputCompany" class="form-label">Company</label>
                    <select id="inputCompany" class="form-select" name="company_id">
                        <option selected="">Choose...</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputCountry" class="form-label">Country</label>
                    <select id="inputCountry" class="form-select" name="country_id">
                        <option selected="">Choose...</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputDate" class="form-label">Date</label>
                    <input type="Date" class="form-control" id="inputDate" name="deliver_date" value="{{ old('deliver_date') }}">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </div>
        </div>
    </form>
@endsection
