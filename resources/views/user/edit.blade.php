@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')

<div class="container-fluid p-0" style="margin-left: 75px; padding-top: 20px;">
    <div class="card" style="position: relative; margin-top: 3px;margin-right: 5px; background-color: rgba(213, 217, 219, 0.97); color: #2d2828">
        <div class="card-header  d-flex justify-content-between align-items-center" style="background-color: rgba(246, 225, 117, 0.9); border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 46px; margin-top: 5;margin-bottom: 0;">Edit User</h5>
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
            <form action="{{ url('/user/update', ['user' => $user->user_id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
                <div class="row h-100">
                    <div class="col-md-12 mb-2">
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <img src="{{ $user->user_image ? asset('storage/img/user/' . $user->user_image) : asset('img/profile_2.png') }}" alt="User Image" style="max-width: 180px; max-height: 180px; width: 100%; height: 100%; object-fit: cover; margin-bottom: 0px;">
                        </div>
                        <label for="user_image" class="mr-md-4" style="font-family: 'Bell MT'; font-size: 26px;">Profile</label>
                        <input type="file" class="form-control" name="user_image" id="user_image" value="{{ old('user_image', $user->user_image) }}" />
                        @error('user_image') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    {{-- <div class="col-md-6"> </div> --}}
                    <div class="col-md-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                        @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $user->middle_name) }}">
                    </div>
                    <div class="col-md-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                    </div>
                    <div class="col-md-1">
                        <label for="suffix_name" class="form-label">Suffix</label>
                        <input type="text" class="form-control" id="suffix_name" name="suffix_name" value="{{ old('suffix_name', $user->suffix_name) }}">
                    </div>
                    <div class="col-md-2 ">
                        <label for="birth_date" class="form-label">Birthdate</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}">
                    </div>
                    <div class="col-md-4 mt-2">
                        <label for="gender_id" class="form-label">Gender</label>
                        <select class="form-select" id="gender_id" name="gender_id">
                            @foreach($genders as $gender)
                                <option value="{{ $gender->gender_id }}" {{ old('gender_id', $user->gender_id) == $gender->gender_id ? 'selected' : '' }}>
                                    {{ $gender->gender }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $user->address) }}</textarea>
                    </div>
                    <div class="col-md-4 mt-2">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number', $user->contact_number) }}">
                    </div>
                    <div class="col-md-4 mt-2">
                        <label for="email_address" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email_address" name="email_address" value="{{ old('email_address', $user->email_address) }}">
                    </div>
                    <div class="col-md-4 mt-2">
                        <label for="role_id" class="form-label">Role</label>
                        <select class="form-select" id="role_id" name="role_id">
                            @foreach($roles as $role)
                                <option value="{{ $role->role_id }}" {{ old('role_id', $user->role_id) == $role->role_id ? 'selected' : '' }}>
                                    {{ $role->role }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mt-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}">
                    </div>
                    <div class="col-md-4 mt-2">
                        <label for="old_password"  class="form-label">Old Password</label>
                        <input type="password" name="old_password" class="form-control" id="old_password">
                    </div>
            
                    <div class="col-md-4 mt-2" >
                        <label for="new_password"  class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new_password">
                    </div>
            
                    <div class="col-md-4 mt-2"  >
                        <label for="new_password_confirmation"  class="form-label">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation">
                    </div>
                    <div class="d-flex justify-content-end mb-4 mt-4">
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

    .form-label {
        font-family: 'Bell MT'; 
        font-size: 26px;"
    }
</style>

@endsection
