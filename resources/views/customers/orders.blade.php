@extends('layouts.app')
@section('content')
<div class="row d-flex align-items-center">
    <div class="col-md-6">
        <h6 class="mb-0 text-uppercase">Table head</h6>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
        <a class="btn btn-secondary" href="{{ url()->previous()}}"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
</div>

    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>Products</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th>{{ $order->id }}</th>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->product->Category->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
