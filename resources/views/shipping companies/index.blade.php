@extends('layouts.app')
@section('content')

    <h6 class="mb-0 text-uppercase">Table head</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th class="t_style">Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>

                        <th>{{ $company->id }}</th>
                        <td>{{ $company->name }}</td>

                        <td>
                            <div class="d-flex order-actions justify-content-center" style="">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit{{$company->id}}"
                                   class="text-primary">
                                    <i class="fa-solid fa-pen"></i>

                                </a>
                                <form method="post" action="{{route('company-delete')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$company->id}}">
                                    <button value="submit" class="text-danger myButton"
                                            href="">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                <button href="#" data-bs-toggle="modal" data-bs-target="#costs{{$company->id}}"
                                        type="button" class="btn btn-sm btn-outline-primary orderButton">costs
                                </button>
                            </div>
                        </td>
                    </tr>
                    {{--edit company--}}
                    <form method="post" action="{{route('company-update')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$company->id}}"/>
                        <div class="modal fade " tabindex="-1" id="edit{{$company->id}}">
                            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <div class="model-title d-flex align-items-center">
                                            <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                                            </div>
                                            <h5 class="mb-0 text-primary">Company</h5>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="inputName" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="inputName" name="name"
                                                       value="{{$company->name}}">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @php($city_price = $company->city_price)
                                                    @foreach(\App\Models\Country::where('sub_of', 0)->get() as $country)
                                                        <div class="col-md-6 mt-2">
                                                            <label for="inputAmount" class="form-label">{{$country->name}}</label>
                                                            <input type="hidden" name="country_id[]" value="{{$country->id}}">
                                                            <input type="text" class="form-control" id="inputAmount"  name="costs[]" value="{{$city_price[$country->id] ?? ''}}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary px-5">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--show costs--}}
                    <div class="modal fade " tabindex="-1" id="costs{{$company->id}}">
                        <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <div class="model-title d-flex align-items-center">
                                        <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Company Costs</h5>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @foreach($company->city_price as $id => $city_price)
                                        @php($country = \App\Models\Country::find($id))
                                        <span class="badge rounded-pill bg-success font-10">
                                       {{$country->name ?? 'N/A'}} : {{ $city_price.'. EGP'  }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
@push('style')
    <style>
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

        .badge{
            font-size: 15px !important;
        }
    </style>

@endpush
{{--@foreach($company->city_price as $id => $city_price)--}}
{{--    @php($country = \App\Models\Country::find($id))--}}
{{--    <span class="badge rounded-pill bg-success font-10">--}}
{{--                               {{$country->name ?? 'N/A'}} : {{ $city_price.'. EGP'  }}--}}
{{--                                </span>--}}
{{--@endforeach--}}
