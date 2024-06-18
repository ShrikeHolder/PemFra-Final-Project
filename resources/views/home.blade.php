@extends('layouts.app')
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $("#productTable").DataTable({
                serverSide: true,
                processing: true,
                ajax: "/getProducts",
                columns: [
                    {
                        data: "name",
                        name: "name"
                    },
                    {
                        data: "price",
                        name: "price"
                    },
                    {
                        data: "stock",
                        name: "stock"
                    },
                    {
                        data: "category.name",
                        name: "category.name"
                    },
                    {
                        data: "actions",
                        name: "actions",
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [
                    [0, "desc"]
                ],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"],
                ],
            });
        });
    </script>
@endpush
@section('content')
    @include('partials.navbar')
    <div class="container-fluid text-center" style="background-color:#F4CDB0">
        <div class="row justify-content-center">
            <div class="col-4">
                <img src="{{ Vite::asset('resources/images/3.png') }}" class="d-block mx-lg-auto img-fluid" width="700"
                    height="500" loading="lazy">
            </div>
            <div class="col-4">
                <h1 class="display-6 fw-bold lh-1 my-5" style="color: #D28468">Selamat datang di Inventory</h1>
                <p class="text-center fw-bold display-1 my-5" style="color: #644961">BREADSHIP</p>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
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
            <table class="table table-bordered table-hover table-striped mb-0 bgwhite" id="productTable">>
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
                            <td>@include('products.actions')</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <br>
        <br>
    </div>
@endsection
