{{-- @extends('layouts.app')

@section('content')
    @include('partials.navbar') --}}
{{-- HERO PART 3 --}}
{{-- <div class="col-lg-3 col-xl-2">
        <div class="d-grid gap-2">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Create Employee</a>
        </div>
    </div> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #644961">
        <div class="container-fluid" style="background-color: #644961;">
            <a class="navbar-brand fw-bold fs-4 px-5" href="#"><img class="d-inline-block align-text-top"
                    src="{{ Vite::asset('resources/images/logo.png') }}" width="45" height="40">Breadship</a>
            <ul class="navbar-nav mb-2 mb-md-0 fs-5" style="padding-right: 5rem;">
                {{-- <li class="nav-item">
                <a class="nav-link text-light fw-semibold" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light fw-semibold" href="#">Product</a>
            </li> --}}
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">Product List</h4>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2">
                    <a href="{{ route('products.create') }}" class="btn"
                        style="background-color: #644961; color:white ">Add
                        Product</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bgwhite">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
ht
{{-- @endsection --}}
