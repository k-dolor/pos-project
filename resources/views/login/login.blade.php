@extends('layout.main')

@section('content')

<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100" style="background-image: url('/uploads/bg.jpg'); background-size: cover; background-position: center;">
    <div class="card p-4" style="max-width: 400px; background-color: rgba(255, 255, 255, 0.5); border: none; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{('/uploads/album.png') }}" alt="Logo Album" style="max-width: 100px;">
                <h3 class="card-title" style="font-family: 'Montserrat', sans-serif; font-size: 24px;">Welcome to Album Station</h3>
                <p class="card-subtitle mb-3" style="font-size: 14px; color: #6c757d;">Log in to continue</p>
                @include('include.message')
            </div>

            <form action="/user/process/login" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" style="border-radius: 8px;">
                    @error('username') <p class="text-danger">{{$message}}</p> @enderror
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="border-radius: 8px;">
                    @error('password') <p class="text-danger">{{$message}}</p> @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block" style="font-family: 'Montserrat'; font-size: 16px; border-radius: 8px;">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
