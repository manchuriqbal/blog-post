@extends('admin.layouts.layout')

@section('title', 'Edit Category')

@section('page_name', 'Edit Category')



@section('content')
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- Edit Profile Card -->
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <form action="{{route('categories.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- thumbnail Picture -->
                            <div class="form-group text-center">
                                <label for="avatar">Thumbnail</label>
                                <div class="mb-3">
                                    <img src="{{ $category->getThumbnail() }}"
                                         alt="Admin Avatar"
                                         class="img-fluid mb-2"
                                         style="width: 120px; height: 120px;">
                                </div>
                            </div>


                                <!-- Category Name -->
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $category->name) }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <!-- Pranet Category -->
                                <div class="form-group">
                                    <label for="parent_id">Parent Category</label>
                                    <select name="parent_id" id="parent_id" class="form-control">
                                        <option  value="">Selcet Parent Category</option>
                                        @foreach ($categories as $parentCategory)
                                            <option {{old('parent_id', $category->parent_id) == $parentCategory->id ? 'selected' : ''}} value="{{ $parentCategory->id }}">
                                                {{ $parentCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                 <!-- Thumbnail -->
                                 <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                                    @error('thumbnail')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                 <!-- Pranet Category -->
                                 <div class="form-group">
                                    <label for="active">Parent Category</label>
                                    <select name="active" id="active" class="form-control">
                                        <option {{$category->active == "1" ? "selected": ""}} value="1">Active</option>
                                        <option {{$category->active == "0" ? "selected": ""}} value="0">Inactive</option>

                                    </select>
                                    @error('active')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>



                                <!-- Submit Button -->
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Update
                                    </button>
                                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
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
