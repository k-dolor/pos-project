@extends('layout.main')

@section('content')

@include('include.sidebar')

@include('include.bg')

<div class="container-fluid p-0" style= "margin-left: 80px; padding-top: 20px;">
    <form action="/user/store" method="post" enctype="multipart/form-data">
                <div class="card" style="position: relative;margin-top: 5px; margin-right: 10px; background-color: rgba(138, 142, 148, 0.85); color: #fff">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(122, 125, 129, 0.95); color:aliceblue; border-bottom: none; ">
                        <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 46px; margin-bottom: 0;">Add User</h5>
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
                    <!---PROFILE--->
                    <div class="col-md-6">
                        <div style="display: flex; flex-direction: column; align-items: center;"> 
                            <img src="{{ asset('img/profile_2.png') }}" alt="Cover Image" style="max-width: 130px; max-height: 130px; width: 100%; height: 100%; object-fit: cover; margin-bottom: 20px;">
                        </div>
                        <label for="user_image" class="mr-md-4" style="font-family: 'Bell MT'; font-size: 26px;">Profile</label>
                        <input type="file" class="form-control" name="user_image" id="user_image" value="{{ old('user_image') }}">
                        @error('user_image') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    
                    <div class="col-md-6"> </div>
                    <!-- FIRST -->
                    <div class="col-md-3">
                        <label for="first_name" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
                    </div>
                    <!-- MIDDLE -->
                    <div class="col-md-3">
                        <label for="middle_name" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
                    </div>
                    <!-- LAST -->
                    <div class="col-md-3">
                        <label for="last_name" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
                    </div>
                    <!-- Suffix -->
                    <div class="col-md-3">
                        <label for="suffix_name" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Suffix</label>
                        <input type="text" class="form-control" id="suffix_name" name="suffix_name" value="{{ old('suffix_name') }}">
                    </div>
                    <!-- Birthdate -->
                    <div class="col-md-3 mt-2">
                        <label for="birth_date" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Birthdate</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                    </div>
                     <!-- Gender -->
                     <div class="col-md-3 mt-2">
                        <label for="gender_id" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Gender</label>
                        <select class="form-select" id="gender_id" name="gender_id">
                            <option value="" selected>N/A</option>
                            @foreach($genders as $gender)
                                <option value="{{ $gender->gender_id }}" {{ old('gender_id') == $gender->gender_id ? 'selected' : '' }}>
                                    {{ $gender->gender }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Address -->
                    <div class="col-md-6">
                        <label for="address" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" value="{{ old('address') }}" ></textarea>
                    </div>
                    <!-- Contact Number -->
                    <div class="col-md-4 mt-2">
                        <label for="contact_number" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Contact Number</label>
                        <input type="tel" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number') }}">
                    </div>
                    <!-- Email -->
                    <div class="col-md-4 mt-2">
                        <label for="email_address" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Email</label>
                        <input type="email" class="form-control" id="email_address" name="email_address" value="{{ old('email_address') }}">
                    </div>
                      <!-- Role -->
                      <div class="col-md-4 mt-2">
                        <label for="role_id" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Role</label>
                        <select class="form-select" id="role_id" name="role_id">
                            <option value="" selected>N/A</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->role_id }}" {{ old('role_id') == $role->role_id ? 'selected' : '' }}>
                                    {{ $role->role }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Username -->
                    <div class="col-md-4">
                        <label for="username" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                    </div>
                    <!-- Password -->
                    <div class="col-md-4">
                        <label for="password" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <!-- Confirm Password -->
                    <div class="col-md-4 mb-4">
                        <label for="confirm_password" class="form-label" style="font-family: 'Bell MT'; font-size: 26px;">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                </div>
                             
                    <!-- Other form fields... -->
                    <div class="d-flex justify-content-end mb-5 mt-3">
                        <button type="submit" class="btn btn-success col-sm-2 float-end" style="font-family: 'Montserrat'; font-size: 20px;">SAVE</button>
                    </div>                
                </div>
            </div>
        </div>
    </form>
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
