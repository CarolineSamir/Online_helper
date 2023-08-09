@extends('layouts.app')
@section('content')
    <div class="card p-5">
        <div class="card-title d-flex align-items-center">
            <div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather me-2 feather-truck text-primary"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            </div>
            <h5 class="mb-0 text-primary">Company</h5>
        </div>
        <hr>
        <form class="row " method="POST" action="{{ route('company-add') }}">
            @csrf

            <div class="col-md-6">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name') }}">
            </div>
            <div class="col-md-6">
                <div class="row">
                    @foreach(\App\Models\Country::where('sub_of', 0)->get() as $country)
                        <div class="col-md-6 mt-2">
                            <label for="inputAmount" class="form-label">{{$country->name}}</label>
                            <input type="hidden" name="country_id[]" value="{{$country->id}}">
                            <input type="text" class="form-control" id="inputAmount"  name="costs[]" value="0">
                        </div>
                    @endforeach
                </div>


            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary px-5">Save</button>
            </div>
        </form>
    </div>
@endsection


