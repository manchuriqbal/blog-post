@extends('admin.layouts.layout')

@section('title', 'Admin Profile')

@section('page_name', 'Admin Details')

@section('content')
<section class="no-padding-top">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Admin Details Card -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h3> {{ $user->first_name . ' ' . $user->last_name }} </h3>
                    </div>
                    <div class="card-body">
                        <!-- Profile Picture -->
                        <div class="text-center mb-4">
                            <img src="{{ $user->avatar() }}"
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
                            <li class="list-group-item">
                                <strong>Role:</strong> {{ $user->role->name }}
                            </li>

                        </ul>
                    </div>
                    <!-- Edit Button -->
                    <div class="card-footer text-center">
                        <a href=" {{route('admin.profile.edit')}} " class="btn btn-primary">
                            <i class="fa fa-edit"></i> Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
