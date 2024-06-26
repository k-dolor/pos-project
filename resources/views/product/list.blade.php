@extends('layout.main')
@include('include.bg')
@include('include.sidebar')

@section('content')


<div class="container-fluid p-0" style="margin-left: 75px; margin-right: 5px; padding-top: 20px;">
    <!-- FORM for SEARCHHHHH -->
    <form action="{{ route('products.search') }}" method="GET" class="mb-2 mt-3" style="padding: 1rem;">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search products..." name="query" style="background-color: rgba(232, 251, 255, 0.7);">
            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </button>
        </div>
    </form>

    <!-- Main card for the table -->
    <div class="card mt-2" style="background-color: rgba(213, 211, 211, 0.80); font-family: 'Metropolis';color: #ffffff">
        {{-- <div class="card mt-2" style="background-color: rgba(205,195,186, .98); font-family: 'Metropolis';color: #000000"> --}}
        <!-- Separate card for List prod -->
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(140, 162, 162, 0.95); border-bottom: none;">
            {{-- <div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(132, 145, 143, 0.65); border-bottom: none;"> --}}
            <h5 class="card-title" style="font-family: 'Bell MT';">List of Products</h5>
            <a href="{{ url('/products/create') }}" class="btn btn-outline-light btn-sm py-1 py-md-2 px-2 px-md-3" style="color: rgb(48, 32, 32); font-size: 14px;">
                <span class="d-none d-sm-inline" >Add Product</span>
                <span class="d-inline d-sm-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                      </svg>  Add
                </span>
            </a>
        </div>
        
        

        <div class="table-responsive mt-2">
            <div class="pagination justify-content-end">
                {{ $products->links() }}
            </div>
            <!-- Table Content -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="d-none d-md-table-cell">Cover</th>
                        <th>Product</th>
                        <th>Artist</th>
                        <th>Price</th>
                        <th class="d-none d-md-table-cell">Year</th>
                        <th class="d-none d-md-table-cell">Supplier</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            <img src="{{ $product->product_image ? asset('storage/product/' . $product->product_image) : asset('product/album.png') }}"  
                              alt="Product Image" style="max-width: 60px; max-height: 60px; width: 100%; height: 100%; object-fit: cover;">
                        </td>
                        <td>{{ $product->product_name }}</td> 
                        <td>{{ $product->artist }}</td> 
                        <td>{{ $product->price }}</td> 
                        <td class="d-none d-md-table-cell">{{ $product->release_date }}</td> 
                        <td class="d-none d-md-table-cell">{{ $product->supplier->supplier }}</td> 
                        <td class="py-2">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/product/show/{{ $product->product_id }}" class="btn btn-show">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                  </svg></a>
                                <a href="/product/edit/{{ $product->product_id }}" class="btn btn-edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" >
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                  </svg></a>
                                <a href="/product/delete/{{ $product->product_id }}" class="btn btn-del">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                  </svg></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    /* CSS rules to for text color inside the table */
    .table td,
    .table th {
        color: #5e4444;
        * Font size is for viewport width */
    }

    /* Add hover effect to table rows */
    .table-hover tbody tr:hover {
        background-color: rgba(65,74,76, 0.9); /* ONYX color */
        color: white; /* Change text color to white */
}

    .table-hover tbody tr:hover td {
        color: white;
    }

    /* .table-hover tbody tr:hover svg {
        fill: white;
    } */
    /* Margin for larger screens */
    .table-responsive {
        margin-left: 2vw; 
        margin-right: 2vw; 
    }

    .card-title {
    font-size: 38px;
    }

    .btn-show {
    background-color: rgb(101, 107, 112);

    color: rgb(255, 255, 255); Set the text color
    }

    .btn-edit {
        background-color: rgb(255, 223, 70);
        color: rgb(39, 42, 43); /* Set the text color */
    }

    .btn-del {
        background-color: rgb(139, 28, 20);
        color: rgb(255, 255, 255); /* Set the text color */
    }


    /* Media query for smaller screens (mobile) */
    @media (max-width: 768px) {
        .table th,
        .table td {
            font-size: 3vw; 
        }
        /* Margin for smaller screens */
        .table-responsive {
            margin-left: 2vw; 
            margin-right: 2vw;
        }

        .card-title {
        font-size: 7vw; /* Adjust font size for smaller screens */
    }
    }
</style>

@endsection
