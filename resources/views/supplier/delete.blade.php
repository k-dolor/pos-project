<!-- Main HTML -->
@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')

<!--HTML Content-->
<div class="container-fluid p-0" style= "margin-left: 80px; padding-top: 20px;">
    <div class="card" style="position: relative; margin-top: 20px;margin-right: 20px; background-color: rgba(5, 15, 15, 0.5); color: #fff">
                <!-- Separate card for DU -->
        <div class="card-header" style="background-color: rgba(128, 12, 3, 0.73); border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 38px;">Delete User</h5>
        </div>
        <p class="card-text" style="font-family: 'Bell MT'; font-size: 28px; "> "Are you sure you want to delete this supplier named" {{
            $supplier->supplier }}"?</p>
            <!---->
            <form action="/supplier/destroy/{{$supplier->supplier_id}}" method = "post">
                @method('DELETE')
            @csrf
            <div class="card-body">
                <div class="row h-100">
            <div class="mt-3">
                <a href="/suppliers" class="btn btn-primary ">NO</a>
                <button type="submit" class="btn btn-danger me-2 float-end">YES</button>
                
            </div>            
        </form>
    </div>
</div>



@endsection

