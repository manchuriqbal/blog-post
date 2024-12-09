@extends('admin.layouts.layout')

@section('title', 'Category Details')
@section('page_name', 'Category Details')

@section('content')


    <main class="container">
        <div class="category-detail">
            <!-- Category Name -->
            <h1>{{ $category->name }}</h1>

            <!-- Category Slug -->
            <p><strong>Slug:</strong> {{ $category->slug }}</p>



            <!-- Category Thumbnail -->
            <div class="category-image">
                <img width="250px" height="200px" src="{{ $category->getThumbnail() }}" alt="">
            </div>

            <!-- Posts Count in This Category -->
            <p><strong>Number of Posts in this Category:</strong> {{$category->posts->count()}} </p> <!-- Replace `category.posts_count` with the actual number -->

            <!-- Posts List -->
            <div class="category-posts">
                <h2>Posts in This Category</h2>

                @foreach ($category->posts as $post)

                <ul>
                    <!-- Loop through the posts for this category -->
                    <li><a href="{{route('posts.show', $post->id)}}"> {{$post->title}}</a></li>
                    <!-- End of loop -->
                </ul>
                @endforeach
            </div>
        </div>
    </main>

@endsection
