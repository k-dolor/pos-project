<!-- Main HTML -->
@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')

<!--HTML Content-->
<div class="container-fluid p-0" style= "margin-left: 80px; margin-right: 10px; margin-top: 10px;padding-top: 20px;">
    <div class="card" style="position: relative; background-color: rgba(5, 15, 15, 0.5); color: #fff">
        <!-- Separate card for DU -->
        <div class="card-header" style="background-color: rgba(128, 12, 3, 0.73); border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 38px;">Delete Product</h5>
        </div>
        <div class="card-body mt-3">
        <p class="card-text" style="font-family: 'Bell MT'; font-size: 30px"> "Are you sure you want to delete" --- {{ $product->product_name }} {{ $product->last_name }} ?</p>
            <!---->
            <form action="/product/destroy/{{$product->product_id}}" method = "post">
                @method('DELETE')
            @csrf
            <div class="card-body">
                <div class="row h-100">
            <div class="mt-3">
                <a href="/products" class="btn btn-primary " style="font-family: 'Bell MT'; font-size: 21px">NO</a>
                <button type="submit" class="btn btn-danger me-2 float-end" style="font-family: 'Bell MT'; font-size: 21px">YES</button>
                
            </div>            
        </form>
    </div>
</div>



@endsection

