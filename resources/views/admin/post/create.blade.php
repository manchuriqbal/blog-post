@extends('admin.layouts.layout')

@section('title', 'Create Posts')

@section('page_name', 'Create Posts')

@section('page-css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- Edit Profile Card -->
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">
                            {{-- <h3>Edit Profile</h3> --}}
                        </div>
                        <div class="card-body">
                            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- author id --}}
                                <input type="hidden" name="author_id" value="{{ auth()->id() }}">



                                <!-- Post Title -->
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" name="title" id="title"  class="form-control" required placeholder="Enter post titile">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Post</label>
                                        <x-forms.tinymce-editor class="form-control" name="content" id="content" rows="3" placeholder="Write you post here.." required/>
                                        {{-- <x-forms.tinymce-editor/> --}}
                                    </div>
                                </div>

                               <!-- Categories -->
                               <div class="form-group">
                                    <label for="categories">Categories</label>
                                    <select name="categories[]" id="categories" class="form-control" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                {{-- Tags --}}
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <select name="tags[]" id="tags" class="form-control" multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
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




                                <!-- Submit Button -->
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Create
                                    </button>
                                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">
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

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#categories').select2({
                placeholder: "Select categories",
                allowClear: true
            });
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

@endsection
