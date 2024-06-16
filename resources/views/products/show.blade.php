@extends('layouts.app')
@section('content')
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Product Details</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <h5>{{ $employee->name }}</h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="price" class="form-label">Price</label>
                        <h5>{{ $employee->price }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <h5>{{ $employee->stock }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="category" class="form-label">Category</label>
                        <h5>{{ $employee->position->name }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="age" class="form-label">Product Photo</label>
                        @if ($employee->original_filename)
                            <h5>{{ $employee->original_filename }}</h5>
                            <a href="{{ route('employees.downloadFile', ['employeeId' => $employee->id]) }}"
                                class="btn btn-primary btn-sm mt-2">
                                <i class="bi bi-download me-1"></i> Download Photo
                            </a>
                        @else
                            <h5>Tidak ada</h5>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('home') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                class="bi-arrow-left-circle me-2"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
