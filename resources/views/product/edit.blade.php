@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')

<div class="container-fluid p-0" style="margin-left: 75px; padding-top: 20px;">
    <div class="card" style="position: relative; margin-top: 5px; margin-right: 10px; background-color: rgba(213, 211, 211, 0.6); color: #303030">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(246, 225, 117, 0.9); color:rgb(54, 59, 62); border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 46px; margin-bottom: 0;">Edit Product</h5>
            <!--- VISIBLE BACK BUTTON--->
            <a href="{{ url('/products') }}" class="btn btn-outline btn-sm py-1 py-md-2 px-2 px-md-3" style="color: rgb(2, 1, 1); font-size: 14px;">
                <span class="d-none d-sm-inline"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16"> 
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                      </svg> Back
                </span>
                <span class="d-inline d-sm-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                      </svg>
                </span>
            </a>
        </div>
        <div class="card-body mt-4">
            <form action="{{ url('/product/update', ['product' => $product->product_id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row h-100">
                    <div class="col-md-12 mb-2 mb-md-3">
                        <div style="text-align: center;">
                            <img src="{{ $product->product_image ? asset('storage/product/' . $product->product_image) : asset('product/album.png') }}" alt="Product Image" style="max-width: 190px; max-height: 190px; width: 100%; height: 100%; object-fit: cover; margin-bottom: 10px;">
                        </div>
                        <label for="product_image" class="mr-md-4" style="font-family: 'Bell MT'; font-size: 26px;">Profile</label>
                        <input type="file" class="form-control" name="product_image" id="product_image" value="{{ old('product_image', $product->product_image) }}" />
                        @error('product_image') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <!--name of Prod-->
                    <div class="col-md-3 mt-2 mt-md-3 mb-2 mb-md-3">
                        <label for="product_name" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name',  $product->product_name) }}">
                        @error('product_name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <!-- ARTIST -->
                    <div class="col-md-3 mt-2 mt-md-3 mb-2 mb-md-3">
                        <label for="artist" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Artist</label>
                        <input type="text" class="form-control" id="artist" name="artist" value="{{ old('artist', $product->artist) }}">
                    </div>
                     <!-- genre -->
                     <div class="col-md-3 mt-2 mt-md-3 mb-2 mb-md-3">
                        <label for="genre" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre', $product->genre) }}">
                    </div>
                    <!----------release------------->
                    <div class="col-md-2 mt-2 mt-md-3 mb-2 mb-md-3">
                        <label for="release_date" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Release Date</label>
                        <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date', $product->release_date) }}">
                    </div>
                    <!-- price -->
                    <div class="col-md-3 mt-2 mt-md-3 mb-2 mb-md-3">
                        <label for="price" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
                    </div>
       
                    <!-- stock -->
                    <div class="col-md-3 mt-2 mt-md-3 mb-2 mb-md-3">
                        <label for="stock" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}">
                    </div>
                    <!---SUPPLIER----->
                    <div class="col-md-5 mt-2 mt-md-3 mb-2 mb-md-3">
                        <label for="supplier_id" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Supplier</label>
                        <select class="form-select" id="supplier_id" name="supplier_id">
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->supplier_id }}" {{ old('supplier_id', $product->supplier_id) == $supplier->supplier_id ? 'selected' : '' }}>
                                    {{ $supplier->supplier }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end mb-5 mt-5">
                        <button type="submit" class="btn btn-success col-sm-2" style="font-family: 'Montserrat'; font-size: 20px;">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    select.form-select {
        color: #000; /* Black text color */
        background-color: #fff; /* White background color */
    }

    select.form-select option {
        color: #000; /* Ensure options have black text color */
        background-color: #fff; /* Ensure options have white background color */
    }
</style>

@endsection
