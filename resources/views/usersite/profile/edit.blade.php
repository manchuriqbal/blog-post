@extends('usersite.layouts.layout')

@section('title', 'Edit Profile')


@section('content')
<div class="no-padding-top col-md-8">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Edit Profile Card -->
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Edit Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('user.profie.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <!-- Profile Picture -->
                            <div class="form-group text-center">
                                <label for="avatar">Profile Picture</label>
                                <div class="mb-3">
                                    <img src="{{ $user->getAvatar() }}"
                                         alt="Admin Avatar"
                                         class="img-fluid rounded-circle mb-2"
                                         style="width: 200px; height: 200px;">
                                </div>
                            </div>

                            <!-- Change Profile Picture -->
                            <div class="form-group">
                                <label for="formFile">Profile Picture</label>
                                <input type="file" name="avatar" class="form-control" type="file" id="formFile">
                                @error('avatar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Username -->
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                       value="{{ old('username', $user->username) }}" required>
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- First Name -->
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control"
                                       value="{{ old('first_name', $user->first_name) }}" required>
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                       value="{{ old('last_name', $user->last_name) }}">
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                       value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Save Changes
                                </button>
                                <a href="{{ route('user.profie.index') }}" class="btn btn-secondary">
                                    <i class="fa fa-arrow-left"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('usersite.partial.sidebar')
@endsection
