@extends('layouts.app')

@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Edit Product</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                id="name" value="{{ $errors->any() ? old('name') : $employee->name }}"
                                placeholder="Enter Product Name">
                            @error('name')
                                <div class="textdanger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price"
                                id="price" value="{{ $errors->any() ? old('price') : $employee->price }}"
                                placeholder="Enter Product Price">
                            @error('price')
                                <div class="textdanger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stock" class="formlabel">Stock</label>
                            <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock"
                                id="stock" value="{{ $errors->any() ? old('stock') : $employee->stock }}"
                                placeholder="Enter Stock">
                            @error('stock')
                                <div class="textdanger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="category" class="formlabel">Category</label>
                            <select name="category" id="category" class="form-select">
                                @php
                                    $selected = '';
                                    if ($errors->any()) {
                                        $selected = old('category');
                                    } else {
                                        $selected = $employee->position_id;
                                    }
                                @endphp
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}" {{ $selected == $position->id ? 'selected' : '' }}>
                                        {{ $position->code . ' - ' . $position->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="textdanger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="photo" class="form-label">Product Photo</label>
                                <input type="file" class="form-control" name="photo" id="photo">
                                @if ($employee->encrypted_filename)
                                    <small class="form-text text-muted">Current Photo:
                                        {{ $employee->original_filename }}</small>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="delete_photo"
                                            id="delete_photo">
                                        <label class="form-check-label" for="delete_photo">
                                            Delete current Photo
                                        </label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 d-grid">
                                <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                        class="bi-arrow-left-circle me-2"></i> Cancel</a>
                            </div>
                            <div class="col-md-6 d-grid">
                                <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                    Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
