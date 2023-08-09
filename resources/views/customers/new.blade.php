@extends('layouts.app')
@section('content')
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">Customer</h5>
        </div>
        <hr>
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ route('customer-add') }}">
                @csrf
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name"
                           value="{{ old('name') }}">
                </div>
                <div class="col-md-6">
                    <label for="inputPhone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="inputPhone" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input class="form-control" id="inputAddress" placeholder="Address..."
                           name="address">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection
