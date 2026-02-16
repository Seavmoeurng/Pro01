@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Category</div>

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
                                    <th scope="col">Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subCategories as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td><!-- Button trigger modal -->
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
                                                                Category
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST"
                                                                action="{{ route('subcategory.update', $item->id) }}">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="mb-3">
                                                                    <label class="form-label">Select Category</label>
                                                                    <select class="form-select" name="category_id">
                                                                        <option disabled>Choose Category ...</option>
                                                                        @foreach ($categories as $cat)
                                                                            <option value="{{ $cat->id }}"
                                                                                {{ $item->category_id == $cat->id ? 'selected' : '' }}>
                                                                                {{ $cat->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Name</label>
                                                                    <input type="text" name="name"
                                                                        value="{{ $item->name }}" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary float-end">Save
                                                                        Changes</button>
                                                                </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <a href="" class="btn btn-primary btn-sm">Edit</a> --}}
                                            <form action="{{ route('subcategory.destroy', $item->id) }}" method="POST"
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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Category Name</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('subcategory.store') }}">
                            @csrf
                            <div class="form-label">Select Category</div>
                            <select class="form-select" name="category_id" aria-label="Default select example">
                                <option selected>Chosse Category ...</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
