@extends('usersite.layouts.layout')
@section('title', 'Home')

@section('custom-css')
    <style>
        article h3 {
            font-size: 35px !important;
        }
    </style>
@endsection


@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
        All Posts
        </h3>

        @foreach ($posts as $post)

        <article class="blog-post mb-4 pb-4 border-bottom">
            <h3 class="post-title display-5 link-body-emphasis mb-1">{{ ucfirst($post->title) }}</h3>
            <p class="blog-post-meta text-muted">
                <span class="post-date">
                    <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($post->published_at)->diffForHumans()  }}
                </span>

                <span class="post-author" style="margin-left: 20px;">
                    <i class="fa fa-user"></i> By <a href="">{{$post->author->fullName()}}</a>
                </span>

                <span class="" style="margin-left: 20px;">
                    <i class="fas fa-list-alt"></i>
                    @foreach ($post->categories as $category)
                        <a href="">{{$category->name}}</a>@if(!$loop->last), @endif
                    @endforeach
                </span>
            </p>

            <div class="row g-3 align-items-center">
                {{-- Left: Post Content --}}
                <div class="col-md-8">
                    <p>{{ Str::limit(strip_tags($post->content), 200) }}</p>
                </div>

                {{-- Right: Post Thumbnail --}}
                <div class="col-md-4 text-end">
                    <a href="">
                        <img src="{{ $post->getThumbnail() }}"
                            alt="{{ $post->title }}"
                            class="img-thumbnail"
                            style="width: 200px; height: 120px; object-fit: cover;">
                    </a>
                </div>
            </div>

            <a href="{{route('user.posts.show', $post->slug)}}" class="btn btn-primary btn-sm">Read More</a>
        </article>

        @endforeach

        <div>
            {{$posts->links()}}
        </div>
    </div>

    @include('usersite.partial.sidebar')
@endsection

