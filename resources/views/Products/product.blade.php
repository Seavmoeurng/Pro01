@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Category</span>
                        <a href="{{ route('product.create') }}" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Add Product</a>
                        {{-- put a modal here --}}
                        <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-primary"  >
                            Add Product
                        </button> --}}

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('product.store') }}"
                                            enctype="multipart/form-data">
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
                                                    <select id="subcategory-dropdown" class="form-select"
                                                        name="subcategory_id">
                                                        <option value="" selected>Choose SubCategory ...</option>
                                                        {{-- We leave this empty; AJAX will fill it --}}
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    required placeholder="Enter name...">
                                            </div>
                                            <div class="mb-4">
                                                <label for="name" class="form-label">Description (optional)</label>
                                                <input type="text" name="description" class="form-control"
                                                    id="description" placeholder="Enter Description">
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

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Close</button>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-success px-5">Add Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end model for insert product --}}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Subcategory Name</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Describtion</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->subcategory->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td style="
                                        width: 100px; ">
                                            {{ $item->description }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            @if ($item->image)
                                                <img src="{{ asset('images/products/' . $item->image) }}"
                                                    alt="{{ $item->name }}"
                                                    style="width: 100px; height: 50px; object-fit: cover;"
                                                    class="rounded border">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $item->id }}">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                                                                Product
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST"
                                                                action="{{ route('product.update', $item->id) }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Select
                                                                            Category</label>
                                                                        <select id="category-dropdown" class="form-select"
                                                                            name="category_id">
                                                                            @foreach ($categories as $cat)
                                                                                <option value="{{ $cat->id }}"
                                                                                    {{ $item->category_id == $cat->id ? 'selected' : '' }}>
                                                                                    {{ $cat->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Select
                                                                            SubCategory</label>
                                                                        <select id="subcategory-dropdown"
                                                                            class="form-select" name="subcategory_id">
                                                                            @foreach ($subcategories as $subcat)
                                                                                <option value="{{ $subcat->id }}"
                                                                                    {{ $item->subcategory_id == $subcat->id ? 'selected' : '' }}>
                                                                                    {{ $subcat->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="name" class="form-label">Name</label>
                                                                    <input type="text" name="name"
                                                                        value="{{ $item->name }}" class="form-control"
                                                                        id="name" required
                                                                        placeholder="Enter name...">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="name" class="form-label">Description
                                                                        (optional)
                                                                    </label>
                                                                    <input type="text" name="description"
                                                                        value="{{ $item->description }}"
                                                                        class="form-control" id="description"
                                                                        placeholder="Enter Description">
                                                                </div>
                                                                <div class="row mb-3">

                                                                    <div class="col-md-6">
                                                                        <label for="name"
                                                                            class="form-label">Price</label>
                                                                        <input type="number" name="price"
                                                                            value="{{ $item->price }}"
                                                                            class="form-control" id="price"
                                                                            placeholder="Enter QTY...">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="name"
                                                                            class="form-label">QTY</label>
                                                                        <input type="number" name="qty"
                                                                            value="{{ $item->qty }}"
                                                                            class="form-control" id="qty"
                                                                            placeholder="Enter Price...">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Product
                                                                        Image</label>
                                                                    <input type="file" name="image"
                                                                        class="form-control" id="image">
                                                                </div>

                                                                {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                                    <button type="submit"
                                                                        class="btn btn-primary px-5">Submit</button>
                                                                </div> --}}
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    {{-- <button type="submit"
                                                                        class="btn btn-primary float-end">Save
                                                                        Changes</button> --}}

                                                                    <button type="submit" class="btn btn-success">Update
                                                                        Product</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <a href="{{ route('product.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a> --}}
                                            <form action="{{ route('product.destroy', $item->id) }}" method="POST"
                                                style="display:inline";>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm "
                                                    onclick="return confirm('Are you sure that you want to Delete This Record?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
