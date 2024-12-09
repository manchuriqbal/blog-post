@extends('admin.layouts.layout')

@section('title', 'Edit Tags')

@section('page_name', 'Edit Tag')

@section('content')
<section class="no-padding-top">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Edit Profile Card -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Update Tag</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('tags.update', $tag->id)}}" method="POST" >
                            @csrf
                            @method('patch')

                            <!-- Tag Name -->
                            <div class="form-group">
                                <label for="name">Tag Name</label>
                                <input type="text" name="name" id="name" class="form-control" required value="{{old('name', $tag->name)}}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <a href="{{ route('tags.index') }}" class="btn btn-secondary">
                                    <i class="fa fa-arrow-left"></i> Cancel
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
