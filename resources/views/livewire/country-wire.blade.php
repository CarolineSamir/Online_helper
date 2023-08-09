<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4  d-flex align-items-center">
                            <h6 class="mb-0 text-uppercase text-primary">countries</h6>
                        </div>
                        <div class="col-md-8 d-flex justify-content-end ">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#new_country"
                               class="btn btn-sm btn-outline-primary d-flex align-items-center justify-content-end">
                                Add New Country
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table mb-0">
                        <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>country</th>
                            <th class="t_style">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($countries->count() > 0)
                            @foreach($countries as $country)
                                <tr style="{{$country_id ==$country->id ? 'background-color: rgba(128,128,128,0.21) ' : '' }}">
                                    <td wire:click="viewCity({{$country->id}})">{{$country->id}}</td>
                                    <td wire:click="viewCity({{$country->id}})">{{$country->name}}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="d-flex order-actions ">
                                            <div class="d-flex order-actions " style="">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#edit{{$country->id}}"
                                                   class="text-primary">
                                                    <i class="fa-solid fa-pen"></i>
                                                    <input type="hidden" name="country_id"
                                                           value="{{$country->id}}">
                                                </a>
                                                <button class="text-danger myButton"
                                                    {{--wire:click="delete()">--}}>
                                                    <input type="hidden" name="id" value="">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
{{--edit country or city--}}
                                <form id="edit_country_{{$country->id}}">
                                    <div class="container">
                                        <div class="modal fade " tabindex="-1" id="edit{{$country->id}}">
                                            <div
                                                class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <div class="model-title d-flex align-items-center">
                                                            <div>
                                                                <i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                                                            </div>
                                                            <h5 class="mb-0 text-primary">edit Category</h5>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="id"
                                                                       value="{{ $country->id }}">

                                                                <label for="inputName" class="form-label">Arabic
                                                                    Country or region</label>
                                                                <input type="text" class="form-control"
                                                                       name="name"
                                                                       value="{{ $country->name }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputSub" class="form-label">Sub
                                                                    Of </label>
                                                                <select class="form-control" id="inputSub"
                                                                        name="sub_of" disabled>
                                                                    <option value="0">-no sub of-</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                {{--                                                                        @dd($country->id)--}}
                                                                <a class="btn btn-primary px-5"
                                                                   onclick="edit({{$country->id}})"
                                                                   wire:click=$emit('refreshCountry')>Save
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
{{--cities list --}}
        <div class="col-lg-6" id="city-list">
            <div class="card">
                <div class="card-header">
                    <div class="row" style="margin:6px -8px !important;">
                        <div class="col-md-4  d-flex align-items-center">
                            <h6 class="mb-0 text-uppercase text-primary">Products</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($cities !== null)
                        <table class="table mb-0">
                            <thead class="table-dark">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th class="t_style">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cities as $city)
                                <tr>
                                    <td>{{$city->id}}</td>
                                    <td>{{$city->name}}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="d-flex order-actions ">
                                            <div class="d-flex order-actions " style="">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#edit{{$city->id}}"
                                                   class="text-primary">
                                                    <i class="fa-solid fa-pen"></i>
                                                    <input type="hidden" name="product_id" value="">
                                                </a>
                                                <button class="text-danger myButton"
                                                        wire:click="delete()">
                                                    <input type="hidden" name="id" value="">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <form id="edit_city_{{$city->id}}">
                                    <div class="container">
                                        <div class="modal fade " tabindex="-1" id="edit{{$city->id}}">
                                            <div
                                                class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <div class="model-title d-flex align-items-center">
                                                            <div>
                                                                <i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                                                            </div>
                                                            <h5 class="mb-0 text-primary">edit Category</h5>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="id"
                                                                       value="{{$city->id}}">

                                                                <label for="inputName" class="form-label">Arabic
                                                                    Country or region</label>
                                                                <input type="text" class="form-control"
                                                                       name="name"
                                                                       value="{{ $city->name }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputSub" class="form-label">Sub
                                                                    Of </label>
                                                                <select class="form-control" id="inputSub"
                                                                        name="sub_of" disabled>
                                                                    <option value="0">-no sub of-</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                {{--                                                                        @dd($country->id)--}}
                                                                <a class="btn btn-primary px-5"
                                                                   onclick="editCity({{$city->id}})"
                                                                   wire:click=$emit('refreshCountry')>Save
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{--new country or city--}}
    <div class="container">
        <div class="modal fade " tabindex="-1" id="new_country">
            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                <div class="modal-content ">
                    <div class="modal-header">
                        <div class="model-title d-flex align-items-center">
                            <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Add country</h5>
                        </div>
                    </div>
                    <div class="modal-body">
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
            </div>
        </div>
    </div>
    @push('script')
        <script>
            function edit(id) {

                var edit_country = $('#edit_country_' + id).serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.post({
                    url: '{{route('country-update')}}',
                    data: edit_country,
                    success: function (data) {
                        success("updated !!");
                        Livewire.emit('refreshCountry');
                        $('#edit' + id).modal('hide');
                    },
                    error: function (data) {
                        error("Error updating country")
                        Livewire.emit('refreshCountry');
                        $('#edit' + id).modal('hide');
                    }
                });
            }
        </script>
        <script>
            function editCity(id) {

                var edit_country = $('#edit_city_' + id).serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.post({
                    url: '{{route('country-update')}}',
                    data: edit_country,
                    success: function (data) {
                        success("updated !!");
                        Livewire.emit('refreshCountry');
                        $('#edit' + id).modal('hide');
                    },
                    error: function (data) {
                        error("Error updating country")
                        Livewire.emit('refreshCountry');
                        $('#edit' + id).modal('hide');
                    }
                });
            }
        </script>
    @endpush
</div>
