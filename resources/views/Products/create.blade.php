@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">Category Name</div>

                    {{-- Changed from 'container' to 'card-body' to fix the "edge" issue --}}
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label class="form-label">Select Category</label>
                                    <select id="category-dropdown" class="form-select" name="category_id">
                                        <option value="" selected>Choose Category ...</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Select SubCategory</label>
                                    {{-- Added the ID here so AJAX can find it --}}
                                    <select id="subcategory-dropdown" class="form-select" name="subcategory_id">
                                        <option value="" selected>Choose SubCategory ...</option>
                                        {{-- We leave this empty; AJAX will fill it --}}
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required
                                    placeholder="Enter name...">
                            </div>
                            <div class="mb-4">
                                <label for="name" class="form-label">Description (optional)</label>
                                <input type="text" name="description" class="form-control" id="description" 
                                    placeholder="Enter Description">
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="name" class="form-label">QTY</label>
                                    <input type="number" name="qty" class="form-control" id="qty"
                                        placeholder="Enter QTY...">
                                </div>

                                <div class="col-md-6">
                                    <label for="name" class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" id="price"
                                        placeholder="Enter Price...">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary px-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Keep the script inside the section or a @stack if your layout has one --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category-dropdown').on('change', function() {
                var categoryId = this.value;
                $("#subcategory-dropdown").html(''); // Clear previous options

                if (categoryId) {
                    $.ajax({
                        url: "{{ url('/get-subcategories') }}/" + categoryId,
                        type: "GET",
                        dataType: "json",
                        success: function(result) {
                            $('#subcategory-dropdown').html(
                                '<option value="">Choose SubCategory...</option>');
                            $.each(result, function(key, value) {
                                $("#subcategory-dropdown").append('<option value="' +
                                    value.id + '">' + value.name + '</option>');
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText); // Helpful for debugging
                        }
                    });
                }
            });
        });
    </script>
@endsection
