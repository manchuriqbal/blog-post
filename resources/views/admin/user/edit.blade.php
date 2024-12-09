@extends('admin.layouts.layout')

@section('title', 'Edit Admin Role')

@section('page_name', 'Edit Admin Role')

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
                    <form action="{{route('users.update', $user)}}" method="POST">
                        @csrf
                        @method('patch')
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
                            <li class="list-group-item">

                                    {{-- User Role --}}
                                    <div class="form-group">
                                        <label for="role">User Role</label>
                                        <select name="role" id="role" class="form-control">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" {{ $user->role->id == $role->id ? 'selected' : '' }}>
                                                    {{ ucfirst($role->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- Edit Button -->
                        <div class="card-footer text-center">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-edit"></i> Update Role
                            </button>
                            {{-- <a href="{{route('users.update', $user->id)}}" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Update Role
                            </a> --}}
                        </div>
                    </div>
                </form>
                </div>

        </div>
    </div>
</section>
@endsection
