@extends('usersite.layouts.layout')

@section('title', $category->name)

@section('content')
<div class="container my-5 col-md-8">
    <!-- category Details -->
    <div class="row mb-5">
        <div class="col-md-4">
            <img src="{{ $category->getThumbnail() }}" alt="{{ $category->name }}" class="img-fluid rounded" style="height: 200px; object-fit: cover;">
        </div>
        <div class="col-md-8">
            <h1>{{ ucfirst($category->name) }}</h1>
            <p><strong>Published:</strong> {{$category->created_at->diffForHumans()}}</p>
            <p><strong>Total Posts:</strong> {{ $category->posts()->count() }}</p>
        </div>
    </div>

        <!-- Subcategories Section -->
        <h2 class="mb-4">Subcategories</h2>
        @if ($category->children->count() > 0)
        <div class="row g-4 mb-5">
            @foreach ($category->children as $children)
            <div class="col-md-6">
                <div class="card">
                    <a href="{{ route('user.categories.show', $children->id) }}">
                        <img src="{{ $children->getThumbnail() }}" alt="{{ $children->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('user.categories.show', $children->id) }}" class="text-decoration-none">
                                {{ Str::limit(ucfirst($children->name), 35, '...') }}
                            </a>
                        </h5>
                        <p class="card-text text-muted">
                            {{ $children->created_at->diffForHumans() }}
                        </p>
                        <a href="{{ route('user.categories.show', $children->id) }}" class="btn btn-sm btn-primary">Explore</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-muted">This category has no subcategories.</p>
        @endif


    <!-- category's Posts -->
    <h2 class="mb-4 mt-4">Posts in {{ $category->name }}</h2>

    @if ($category->posts->count() > 0)
    <div class="row g-4">
        @foreach ($category->posts as $post)
        <div class="col-md-6">
            <div class="card">
                <a href="{{ route('user.posts.show', $post->slug) }}">
                    <img src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('user.posts.show', $post->slug) }}" class="text-decoration-none ">
                            {{ Str::limit(ucfirst($post->title), 35, '...') }}
                        </a>
                    </h5>
                    <p class="card-text text-muted">
                        {{ \Illuminate\Support\Str::limit($post->content, 80, '...') }}
                    </p>
                    <p class="text-muted small">
                        <i class="fas fa-calendar-alt"></i> {{ $post->published_at ? $post->published_at->diffForHumans() : 'Unpublished' }}
                    </p>
                    <a href="{{ route('user.posts.show', $post->slug) }}" class="btn btn-sm btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-muted">This Category has not any posts yet.</p>
    @endif
</div>

<!-- Sidebar -->
@include('usersite.partial.sidebar')
@endsection
