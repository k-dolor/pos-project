<!-- Main HTML -->
@extends('layout.main')

@section('content')


@include('include.bg')
@include('include.sidebar')

<!--HTML Content-->
    <div class="container-fluid p-0" style= "margin-left: 80px; padding-top: 20px;">
            <form action="#" method="post">
                <div class="card" style="position: relative;margin-top: 5px; margin-right: 10px; background-color: rgba(213, 217, 219, 0.97); color: #303030">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(138, 142, 148, 0.95); color:aliceblue; border-bottom: none; ">
                        <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 46px; margin-bottom: 0;">User Details</h5>
                         <!--- VISIBLE BACK BUTTON--->
                         <a href="{{ url('/users') }}" class="btn btn-outline btn-sm py-1 py-md-2 px-2 px-md-3" style="color: rgb(2, 1, 1); font-size: 14px;">
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
                 <!-- User Image -->
                 <div class="col-md-12 text-center">
                    <img src="{{$users->user_image ?  asset ('storage/img/user/' . $users->user_image) :
                    asset('img/profile_2.png') }}" alt="User Image" style="max-width: 200px; max-height: 200px; width: 100%; height: 100%; object-fit: cover;">
                     <hr style="background-color: white;">
                 </div>
                <!-- First Name -->
                 <div class="col-md-3 mt-2 mt-md-4 mb-2 mb-md-4">
                    <label for="first_name" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$users->first_name}}" readonly/>
                 </div>
                <!-- Middle Name -->
                 <div class="col-md-3 mt-2 mt-md-4 mb-2 mb-md-4">
                    <label for="middle_name" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{$users->middle_name}}" readonly/>
                </div>
                 <!-- Last Name -->
                 <div class="col-md-3 mt-2 mt-md-4 mb-2 mb-md-4">
                    <label for="last_name" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$users->last_name}}" readonly/>
                </div>
                <!-- Suffix -->
                <div class="col-md-1 mt-2 mt-md-4 mb-2 mb-md-4">
                    <label for="suffix_name" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Suffix</label>
                    <input type="text" class="form-control" id="suffix_name" name="suffix_name" value="{{$users->suffix_name}}" readonly/>
                </div>
                <!-- Birthdate -->
                <div class="col-md-2 mt-2 mt-md-4 mb-2 mb-md-4">
                    <label for="birth_date" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Birthdate</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{$users->birth_date}}" readonly/>
                </div>
                <!-- Gender -->
                <div class="col-md-4 mt-2 mt-md-4 mb-2 mb-md-4">
                    <label for="gender" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Gender</label>
                    <input type="text" class="form-control" name="gender" id="gender" value="{{ $users->gender->gender }}" readonly />
                </div>
                
                <!-- Address -->
                <div class="col-md-4 mt-2 mt-md-4 mb-2 mb-md-4">
                    <label for="address" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$users->address}}" readonly/>
                </div>
                <!-- Contact Number -->
                <div class="col-md-4 mt-2 mt-md-4 mb-2 mb-md-4">
                    <label for="contact_number" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Contact Number</label>
                    <input type="tel" class="form-control" id="contact_number" name="contact_number"  value="{{$users->contact_number}}" readonly/>
                </div>
                <!-- Email -->
                <div class="col-md-4 mt-2 mt-md-4 mb-2 mb-md-4">
                    <label for="email_address" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Email</label>
                    <input type="email" class="form-control" id="email_address" name="email_address"  value="{{$users->email_address}}" readonly/>
                </div>
                <!-- ROLE -->
                <div class="col-md-4 mt-2 mt-md-4 mb-2 mb-md-4">
                    <label for="role" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Role</label>
                    <input type="text" class="form-control" name="role" id="role" value="{{ $users->role->role }}" readonly />
                </div>
                <!-- Username -->
                <div class="col-md-4 mt-2 mt-md-4 mb-5 mb-md-4">
                    <label for="username" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Username</label>
                    <input type="text" class="form-control" id="username" name="username"  value="{{$users->username}}" readonly/>
                </div>


                 @error('user') <p class="text-danger">{{$message}}</p>
                 @enderror
        </label>
        </form>
    </div>
</div>


@endsection

