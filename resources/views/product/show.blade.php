<!-- Main HTML -->
@extends('layout.main')

@section('content')


@include('include.bg')
@include('include.sidebar')

<!--HTML Content-->
    <div class="container-fluid p-0" style= "margin-left: 80px; padding-top: 20px;">
                <div class="card" style="position: relative;margin-top: 5px; margin-right: 10px; background-color: rgba(213, 211, 211, 0.5); color: #303030">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(64,64,64, 0.777); color:aliceblue; border-bottom: none; ">
                        <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 46px; margin-bottom: 0;">Product Details</h5>
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
                <div class="card-body">                  
                 @csrf
                 <div class="row h-100">
                 <!-- product Image -->
                 <div class="col-md-12 text-center">
                    <img src="{{$products->product_image ?  asset ('storage/product/' . $products->product_image) :
                    asset('product/album.png') }}" alt="product Image" style="max-width: 200px; max-height: 200px; width: 100%; height: 100%; object-fit: cover;">
                     <hr style="background-color: white;">
                 </div>
                <!-- Prod Name -->
                 <div class="col-md-4 mt-2 mt-md-5 mb-2 mb-md-5">
                    <div class="center-label">
                    <label for="product_name" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Product</label> </div>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{$products->product_name}}" readonly/>
                 </div>

                 {{-- <div class="col-md-1 mt-4"></div> --}}

                 <!-- ARTiST -->
                 <div class="col-md-4 mt-2 mt-md-5 mb-2 mb-md-5">
                    <div class="center-label">
                    <label for="artist" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Artist</label> </div>
                    <input type="text" class="form-control" id="artist" name="artist" value="{{$products->artist}}" readonly/>
                 </div>
                 <!-- genre -->
                 <div class="col-md-4 mt-2 mt-md-5 mb-2 mb-md-5">
                    <div class="center-label">
                    <label for="genre" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Genre</label> </div>
                    <input type="text" class="form-control" id="genre" name="genre" value="{{$products->genre}}" readonly/>
                 </div>
                <!-- Release -->
                <div class="col-md-3 mt-2 mt-md-5 mb-2 mb-md-5">
                    <div class="center-label">
                    <label for="release_date" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;  ">Release</label> </div>
                    <input type="date" class="form-control" id="release_date" name="release_date" value="{{$products->release_date}}" readonly/>
                </div>
                <!-- priceprice -->
                <div class="col-md-3 mt-2 mt-md-5 mb-2 mb-md-5">
                    <div class="center-label">
                    <label for="price" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Price</label> </div>
                    <input type="text" class="form-control" id="price" name="price" value="{{$products->price}}" readonly/>
                 </div>
                 <!-- Stock -->
                 <div class="col-md-3 mt-2 mt-md-5 mb-2 mb-md-5">
                    <div class="center-label"> 
                    <label for="stock" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Stock</label> </div>
                    <input type="text" class="form-control" id="stock" name="stock" value="{{$products->stock}}" readonly/>
                 </div>
                 <!-- Supplier -->
                 <div class="col-md-3 mt-2 mt-md-5 mb-5 mb-md-5">
                    <div class="center-label">
                    <label for="supplier" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Supplier</label> </div>
                    <input type="text" class="form-control" name="supplier" id="supplier" value="{{ $products->supplier->supplier }}" readonly/>
                </div>
                 @error('product') <p class="text-danger">{{$message}}</p>
                 @enderror
        </label>
        </form>
    </div>
</div>

<style>
    .center-label {
        text-align: center;
    }

    .form-control {
        background-color:  rgba(255, 255, 255, 0.);
    }

    .btn-outline-secondary:hover,
.btn-outline-secondary:focus {
    color: #007bff !important; /* Blue color */
    background-color: rgba(255,255,255,0.1) !important;
}


</style>



@endsection

