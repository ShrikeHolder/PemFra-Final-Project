@extends('layouts.app')

@section('content')
    @include('partials.navbar')
{{-- HERO PART 3 --}}
{{-- <div class="col-lg-3 col-xl-2">
        <div class="d-grid gap-2">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Create Employee</a>
        </div>
    </div> --}}
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">Product List</h4>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2">
                    <a href="{{ route('products.create') }}" class="btn"
                        style="background-color: #644961; color:white ">Add Product</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bgwhite">
                <thead>
                    <tr style="text-align: center">
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('products.show', ['product' => $product->product_id]) }}"
                                        class="btn btn-outline-dark btn-sm me2"><i class="bi-person-lines-fill"></i></a>
                                    <a href="{{ route('products.edit', ['product' => $product->product_id]) }}"
                                        class="btn btn-outline-dark btn-sm me2"><i class="bi-pencil-square"></i></a>
                                    <div>
                                        <form
                                            action="{{ route('products.destroy', ['employee' => $product->product_id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i
                                                    class="bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
