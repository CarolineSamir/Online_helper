<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4  d-flex align-items-center">
                            <h6 class="mb-0 text-uppercase text-primary">Categories</h6>
                        </div>
                        <div class="col-md-8 d-flex justify-content-end ">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#new_category"
                               class="btn btn-sm btn-outline-primary d-flex align-items-center justify-content-end">
                                Add New Category
                            </a>
                        </div>
                    </div>
                </div>
{{-- view category --}}
                <div class="card-body">
                    <table class="table mb-0">
                        <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th class="t_style">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($categories->count() > 0)
                            @foreach($categories as $category)
                                <tr style="  {{$cat_id == $category->id ? 'background-color: rgba(128,128,128,0.21) ': ''}} ">
                                    <th wire:click="viewProduct({{$category->id}})">{{ $category->id }}</th>
                                    <td wire:click="viewProduct({{$category->id}})">{{ $category->name }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="d-flex order-actions ">
                                            <div class="d-flex order-actions " style="">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#edit{{$category->id}}"
                                                   class="text-primary">
                                                    <i class="fa-solid fa-pen"></i>
                                                    <input type="hidden" name="product_id" value="">
                                                </a>
                                                <button class="text-danger myButton"
                                                        wire:click="delete({{$category->id}})">
                                                    <input type="hidden" name="id" value="{{$category->id}}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
{{--  edit category --}}
                                <form id="edit_category_{{$category->id}}">
                                    <div class="container">
                                        <div class="modal fade " tabindex="-1" id="edit{{$category->id}}">
                                            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <div class="model-title d-flex align-items-center">
                                                            <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                                                            </div>
                                                            <h5 class="mb-0 text-primary">edit Category</h5>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row g-3">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="id" value="{{$category->id}}">

                                                                <label for="inputName" class="form-label">Category</label>

                                                                <input type="text" class="form-control" name="name" value="{{$category->name}}">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <a  class="btn btn-primary px-5"
                                                                        onclick="edit({{$category->id}})"
                                                                wire:click=$emit('refreshCategory')>Save
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
{{--product list--}}
        <div class="col-lg-6" id="product-list">
            <div class="card">
                <div class="card-header">
                    <div class="row" style="margin:6px -8px !important;">
                        <div class="col-md-4  d-flex align-items-center">
                            <h6 class="mb-0 text-uppercase text-primary">Products</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                 {{--delete category--}}
                    @if($err)
                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white">{{$err}}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @php($this->err = null)
                    @endif
                    @if($products != null)
                        <table class="table mb-0">
                            <thead class="table-dark">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th class="t_style">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th>{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td class="t_style">{{ $product->amount }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @endif
                </div>
            </div>
        </div>
    </div>
{{--new category--}}
    <div class="container">
        <div class="modal fade " tabindex="-1" id="new_category">
            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                <div class="modal-content ">
                    <div class="modal-header">
                        <div class="model-title d-flex align-items-center">
                            <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Add Category</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('category-add') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="inputName" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                           value="{{ old('category') }}">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary px-5">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            function edit(id){
                var edit_category =  $('#edit_category_'+id).serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.post({
                    url: '{{route('category-update')}}',
                    data: edit_category,
                    success: function (data) {
                        success("updated !!");
                        Livewire.emit('refreshCategory');
                        $('#edit'+id).modal('hide');
                    },
                    error: function (data) {
                        error("Error updating category")
                    }
                });
            }
        </script>
    @endpush
</div>



{{--$("#edit_category").submit(function (){--}}
{{--edit = $("#edit_category");--}}
{{--$.ajax({--}}
{{--method: "POST",--}}
{{--url : '{{route('category-update')}}',--}}
{{--data: edit.serialize(),--}}
{{--success: function (data) {--}}

{{--},--}}
{{--error: function (data) {--}}

{{--}--}}
{{--})--}}
{{--})--}}
