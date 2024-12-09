@extends('admin.layouts.layout')

@section('title', 'Create Role')

@section('page_name', 'Create Admin Role')

@section('content')
<section class="no-padding-top">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Edit Profile Card -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Create new Role</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" >
                            @csrf


                            <!-- Role Name -->
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
