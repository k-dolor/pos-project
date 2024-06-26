@extends('layout.main')

@section('content')


<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100" style="background-image: url('/uploads/bg.jpg'); background-size: cover; background-position: center;">
    <div class="card p-4" style="width: 450px; background-color: rgba(1, 5, 8, 0.7); color: #fff; border-radius: 20px;">
        <div class="mt-4 text-center">
            <img src="{{ asset('uploads/album.png') }}" alt="Logo" style="max-width: 250px;">
        </div>
        <form action="/user/process/logout" method="get">
        <h3 class="mt-3 mb-5 text-center" style="font-family: 'Bell MT'; font-size: 42px;">Are you sure you want to logout?</h3>
        <div class="row">
            <div class="col-6">
                <a href="{{ url('user/process/logout') }}" class="btn btn-outline-danger w-100" style="border-radius: 15px; padding: 10px; font-size: 18px;">Yes</a>
            </div>
            <div class="col-6">
                <a href="{{ url('/home') }}" class="btn btn-outline-primary w-100" style="border-radius: 15px; padding: 10px; font-size: 18px;">No</a>
            </div>
        </div>
    </div>
</div>
@endsection
