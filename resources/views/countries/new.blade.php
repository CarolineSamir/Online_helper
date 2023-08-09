@extends('layouts.app')
@section('content')
    <div class="card p-5">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">Countries</h5>
        </div>
        <hr>
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ route('country-add') }}">
                @csrf
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Arabic Country or region</label>
                    <input type="text" class="form-control" id="inputName" name="name"
                           value="{{ old('name') }}">
                </div>
                <div class="col-md-6">
                    <label for="inputSub" class="form-label">Sub Of</label>
                    <select class="form-control" id="inputSub" name="sub_of">
                        <option value="0">-no sub of-</option>
                        @foreach($countries as $country)
                            @if($country->sub_of == 0){
                            <option value="{{ $country->id }}">{{ $country->name}}</option>
                            }
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection
