@extends('admin.layouts.layout')

@section('title', 'Profile Datils')

@section('page_name', 'Profile Datils')

@section('content')
<section class="no-padding-top">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Admin Details Card -->
            <div class="col-md-6">
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
                                 style="width: 120px; height: 120px;">
                        </div>
                        <!-- Admin Info -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Username:</strong> {{ $user->username ?? 'Not provided'}}
                            </li>
                            <li class="list-group-item">
                                <strong>Email:</strong> {{ $user->email ?? 'Not provided' }}
                            </li>
                            <li class="list-group-item">
                                <strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}
                            </li>
                            @if ($user->role->name == 'admin')
                                <li class="text-success list-group-item">Admin</li>
                            @elseif ($user->role->name == 'author')
                                <li class="text-warning list-group-item">Author</li>
                            @elseif ($user->role->name == 'user')
                                <li class="text-info list-group-item">User</li>
                            @endif

                        </ul>
                    </div>
                    <!-- Edit Button -->
                    <div class="form-group text-center">
                    @if (auth()->check() && auth()->user()->role_id == '1')
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary ">
                            <i class="fa fa-edit"></i> Edit Role
                        </a>
                    @endif
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
