@extends('usersite.layouts.layout')

@section('title', 'Profile')

@section('content')
<div class="no-padding-top col-md-8">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Admin Details Card -->
          <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h3> {{ $user->fullName() }} </h3>
                </div>
                <div class="card-body">
                    <!-- Profile Picture -->
                    <div class="text-center mb-4">
                        <img src="{{ $user->getAvatar() }}"
                                alt="Admin Avatar"
                                class="img-fluid rounded-circle"
                                style="width: 200px; height: 200px;">
                    </div>
                    <!-- Admin Info -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>First Name:</strong> {{ $user->first_name ?? 'Not provided'}}
                        </li>
                        <li class="list-group-item">
                            <strong>Last Name:</strong> {{ $user->last_name ?? 'Not provided'}}
                        </li>
                        <li class="list-group-item">
                            <strong>Username:</strong> {{ $user->username ?? 'Not provided'}}
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ $user->email ?? 'Not provided' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}
                        </li>
                    </ul>
                </div>
                <!-- Edit Button -->
                <div class="form-group text-center">
                    <a href="{{route('user.profie.edit')}}" class="btn btn-secondary">
                        <i class="fa fa-edit"></i> Edit Profile
                    </a>
                    <a href="{{route('user.profie.password_edit')}}" class="btn btn-primary">
                        <i class="fas fa-lock"></i> Password Change
                    </a>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@include('usersite.partial.sidebar')
@endsection
