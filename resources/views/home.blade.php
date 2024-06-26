@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')



<div class="container-fluid mt-4">
    <div class="container mt-4">
       <!-- Dashboard Section -->
       <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: none;">
        <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 38px;">Dashboard</h5>
    </div>
<div class="row">
    <div class="col-md-4 mt-5">
        <div class="card text-dark mb-3" style="background-color: #bbbbbb; opacity: 0.9; height: 200px; width: 400px;">
            <div class="card-header" style="font-family: 'Bell MT', sans-serif; font-size: 25px;">Total Users</div>
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="card-title" style="font-family: 'Bell MT', sans-serif; font-size: 35px;">{{ $totalUsers }}</h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                </svg> 
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mt-5 ml-2">
        <div class="card text-dark mb-3" style="background-color: #b3e7c0; opacity: 0.9; height: 200px; width: 400px;">
            <div class="card-header" style="font-family: 'Bell MT', sans-serif;  font-size: 25px;">Total Products</div>
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="card-title" style="font-family: 'Bell MT', sans-serif; font-size: 35px;">{{ $totalProducts }}</h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
                    <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0z"/>
                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6z"/>
                  </svg>
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-5 ml-2">
        <div class="card text-dark mb-3" style="background-color: #a5d2d9; opacity: 0.9; height: 200px; width: 400px;">
            <div class="card-header" style="font-family: 'Bell MT', sans-serif;  font-size: 25px;">Total Suppliers</div>
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="card-title" style="font-family: 'Bell MT', sans-serif; font-size: 35px;">{{ $totalSuppliers }}</h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                  </svg>
            </div>
        </div>
    </div>
</div>


<style>
    .main-heading {
        font-size: 75px;
        margin-left: auto;
        margin-right: auto;
    }

    
    @media (max-width: 768px) {
        .main-heading {
            font-size: 45px;
            margin-left: 50px;
        }

        .sub-heading {
            font-size: 20px;
            margin-left: 60px;
            margin-right: 10px;
        }
    }

    /* Adjust container/card position when sidebar is open */
    @media (min-width: 768px) {
        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }

</style>

@endsection
