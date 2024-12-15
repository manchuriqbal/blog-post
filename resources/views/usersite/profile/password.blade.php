@extends('usersite.layouts.layout')

@section('title', 'Password Change')

@section('content')
<div class="no-padding-top col-md-8">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Edit Profile Card -->
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Change Password</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('user.profie.password_update')}}" method="POST" >
                            @csrf
                            @method('patch')
                            {{-- Current password --}}
                            <div>
                                <label for="phone">Currunt Password</label>
                                <input  name="current_password" type="password" class="form-control" autocomplete="current-password" />
                                @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Update password --}}
                            <div>
                                <label for="phone">New Password</label>
                                <input  name="password" type="password" class="form-control" autocomplete="current-password" />
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div>
                                <label for="phone">Confirm Password</label>
                                <input  name="password_confirmation" type="password" class="form-control" autocomplete="current-password" />
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                             <!-- Submit Button -->
                             <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>Changes Password
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
