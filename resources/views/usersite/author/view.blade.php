@extends('usersite.layouts.layout')

@section('title', $author->fullName())

@section('content')
<div class="container my-5 col-md-8">
    <!-- Author Details -->
    <div class="row mb-5">
        <div class="col-md-4">
            <img src="{{ $author->getAvatar() }}" alt="{{ $author->fullName() }}" class="img-fluid rounded" style="height: 200px; object-fit: cover;">
        </div>
        <div class="col-md-8">
            <h1>{{ $author->fullName() }}</h1>
            <p><strong>Email:</strong> {{ $author->email }}</p>
            <p><strong>Joined:</strong> {{$author->created_at->diffForHumans()}}</p>
            <p><strong>Total Posts:</strong> {{ $author->posts()->count() }}</p>
            <p>{{ $author->bio ?? 'No bio available for this author.' }}</p>
        </div>
    </div>

    <!-- Author's Posts -->
    <h2 class="mb-4">Posts by {{ $author->fullName() }}</h2>

    @if ($author->posts->count() > 0)
    <div class="row g-4">
        @foreach ($author->posts as $post)
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
    <p class="text-muted">This author has not written any posts yet.</p>
    @endif
</div>

<!-- Sidebar -->
@include('usersite.partial.sidebar')
@endsection
