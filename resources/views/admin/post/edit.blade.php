@extends('admin.layouts.layout')

@section('title', 'Edit Posts')

@section('page_name', 'Edit Posts')

@section('page-css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- Edit Profile Card -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">
                            {{-- <h3>Edit Profile</h3> --}}
                        </div>
                        <div class="card-body">
                            <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
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
                                    <img src="{{ $post->getThumbnail() }}"
                                         alt="Admin Avatar"
                                         class="img-fluid mb-2"
                                         style="width: 150px; height: 100%;">
                                </div>
                            </div>

                                <!-- Post Title -->
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" name="title" id="title"  class="form-control" required placeholder="Enter post titile" value="{{old('title', $post->title)}}">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Post Status --}}
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Post</label>
                                        <textarea class="form-control" name="content" id="content" rows="4" placeholder="Write your post here..." required>{{ old('content', $post->content ?? '') }}</textarea>
                                    </div>
                                </div>

                                <!-- Categories -->
                                <div class="form-group">
                                    <label for="categories">Categories</label>
                                    <select name="categories[]" id="categories" class="form-control" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ in_array($category->id, old('categories', $post->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
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
                                            <option value="{{ $tag->id }}"
                                                {{in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : ''}}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                    <!-- Status -->
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                            <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                                            <option value="archived" {{ old('status', $post->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                                        </select>
                                        @error('status')
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
                                        <i class="fa fa-edit"></i> Update
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#categories, #tags').select2({
                placeholder: "Select options",
                allowClear: true
            });
        });
    </script>


@endsection
