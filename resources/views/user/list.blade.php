@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')

<div class="container-fluid p-0" style="margin-left: 75px;margin-right: 5px;margin-bottom: 60px; padding-top: 20px;">
     <!-- FOr SEARCHHHHH-->
     <form action="{{ route('users.search') }}" method="GET" class="mb-2 mt-3" style="padding: 1rem;">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search users..." name="query" style="background-color: rgba(232, 251, 255, 0.8);">
            <select class="form-select" name="gender">
                <option value="">All</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </button>
        </div>
    </form>
    <!-- Main card for the table -->
    <div class="card" style="background-color: rgba(213, 217, 219, 0.80);  font-family: 'Metropolis';">
        <!-- Separate card for LU -->
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(138, 142, 148, 0.95); border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 38px;">List of Users</h5>
            <a href="{{ url('/users/create') }}" class="btn btn-outline-light btn-sm py-1 py-md-2 px-2 px-md-3" style="color: rgb(48, 32, 32); font-size: 14px;">
                <span class="d-none d-sm-inline">Add User</span>
                <span class="d-inline d-sm-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                      </svg> Add
                </span>
            </a>
        </div>

        <div class="table-responsive mt-2">
            <div class="pagination justify-content-end">
                {{ $users->links() }}
            </div>

            <!-- Table Content -->
            <table class="table table-hover" style="color: #2e1f1f;">
                <thead class="table-secondary">
                    <tr>
                        <th>Profile</th>
                        <th>Full Name</th>
                        <th class="d-none d-md-table-cell">Username</th>
                        <th class="d-none d-md-table-cell">Email</th>
                        <th class="d-none d-md-table-cell">Gender</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <img src="{{ $user->user_image ? asset('storage/img/user/' . $user->user_image) : asset('img/profile_2.png') }}"  alt="Profile Image" 
                                style="max-width: 60px; max-height: 60px; width: 100%; height: 100%; object-fit: cover;"></td>
                        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                        <td class="d-none d-md-table-cell">{{ $user->username}}</td>
                        <td class="d-none d-md-table-cell">{{ $user->email_address }}</td>
                        <td class="d-none d-md-table-cell">{{ $user->gender->gender }}</td>
                        <td>{{ $user->role->role }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/users/show/{{ $user->user_id }}" class="btn btn-show">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                  </svg></a>
                                <a href="/user/edit/{{ $user->user_id }}" class="btn btn-edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" >
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                  </svg></a>
                                <a href="/user/delete/{{ $user->user_id }}" class="btn btn-del">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                  </svg></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    /* Add CSS rule to force text color inside the table to be white */
    .table td,
    .table th {
        color: #342222;
        font-size: 1.0vw; 
    }
    /* Add hover effect to table rows */
    .table-hover tbody tr:hover {
    background-color: rgba(14, 62, 72, 0.7); /* Light sky blue */
    color: white; /* Change text color to white */
}

    .table-hover tbody tr:hover td {
        color: white;
    }

    /* .table-hover tbody tr:hover svg {
        fill: white;
    } */

    .table-responsive {
        margin-left: 2vw; 
        margin-right: 2vw; 
    }
    .btn-show {
    background-color: rgb(101, 107, 112);

    color: rgb(255, 255, 255); Set the text color
    }

    .btn-edit {
        background-color: rgb(255, 223, 70);
        color: rgb(39, 42, 43); /* Set the text color */
    }

    .btn-del {
        background-color: rgb(139, 28, 20);
        color: rgb(255, 255, 255); /* Set the text color */
    }


    /* Media query for smaller screens */
    @media (max-width: 768px) {
        .table th,
        .table td {
            font-size: 3vw; 
        }
        /* Margin for smaller screens */
        .table-responsive {
            margin-left: 2vw; 
            margin-right: 2vw;
        }

        .card-title {
        font-size: 7vw; /* Adjust font size for smaller screens */
    }
        
    }

    div.pagination a {
        color: rgb(69, 46, 50) !important;
        background-color: transparent !important;
        display: flex;
        justify-content: flex-end;
    }
    /* Adjust input group styles for responsiveness */
    .input-group {
        flex-wrap: wrap;
        margin-bottom: 1rem;
    }

    .input-group input[type="text"] {
        flex: 1 1 auto;
        margin-bottom: 0.5rem;
    }

    .input-group button[type="submit"] {
        margin-bottom: 0.5rem;
    }

    /* Adjust card title style for responsiveness */
    .card-title {
        font-family: 'Bell MT';
        font-size: 2.375rem; /* Adjust font size for smaller screens */
    }


    
</style>


@endsection
