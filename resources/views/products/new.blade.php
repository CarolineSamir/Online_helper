@extends('layouts.app')
@section('content')
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div><i class=" bx bx-store-alt  me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary"> products</h5>
        </div>
        <hr>
        <div class="card-body">
        <form class="row g-3" method="POST" action="{{ route('product-add') }}">
            @csrf
            <div class="col-md-6">
                <label for="inputCategory" class="form-label">Category</label>
                <select id="inputCategory" class="form-select" name="category" onchange="newCategory(this.value)">
                    <option selected="">Choose...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}">{{$category->name}}</option>
                    @endforeach
                    <option value="0" >add new</option>
                </select>
            </div>
            <div class="col-md-6">
                <div  style="display: none;" id="category">
                    <label for="inputCategory" class="form-label">add new category</label>
                    <input type="text" id="inputCategory" class="form-control" name="other" value="{{ old('other') }}" placeholder="add new">

                </div>
            </div>
            <div class="col-md-6">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name') }}">
            </div>
            <div class="col-md-6">
                <label for="inputDescription" class="form-label">Description</label>
                <input type="text" class="form-control" id="inputDescription" name="description"
                       value="{{ old('description') }}">
            </div>
            <div class="col-md-6">
                <label for="inputAmount" class="form-label">Amount</label>
                <input type="text" class="form-control" id="inputAmount"  name="amount" value="{{ old('amount') }}">
            </div>
            <div class="col-md-6">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="text" class="form-control" id="inputPrice"  name="price" value="{{ old('price') }}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary px-5">Save</button>
            </div>
        </form>
        </div>
    </div>
@endsection

@push('script')

    <script>
        function newCategory(value) {

            if (value == 0) {
                $('#category').show();
                // $('#inputCategory')
            }else {
                $('#category').hide();
            }
        }
    </script>

@endpush

