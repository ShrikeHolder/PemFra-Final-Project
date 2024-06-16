@extends('layouts.app')

@section('content')
    @include('partials.navbar')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">Product List</h4>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2">
                    <a href="{{ route('products.create') }}" class="btn" style="background-color: #644961; color:white ">Add
                        Product</a>
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
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td style="text-align: center">{{ $product->price }}</td>
                            <td style="text-align: center">{{ $product->stock }}</td>
                            <td style="text-align: center">{{ $product->category->name }}</td>
                            <td>@include('layouts.actions')</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
