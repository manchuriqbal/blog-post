@extends('usersite.layouts.layout')
@section('title', 'Home')

@section('custom-css')
    <style>
        article h3 {
            font-size: 35px !important;
        }
    </style>
@endsection

@section('featuredPost')
    @include('usersite.partial.featuredpost', ['featuredpost' => $featuredpost])
@endsection

@section('content')

<div class="col-md-8">
    <h3 class="pb-4 mb-4 fst-italic border-bottom">
        From the Firehose
    </h3>

    @foreach ($posts as $post)

    <article class="blog-post mb-4 pb-4 border-bottom">
        <h3 class="post-title display-5 link-body-emphasis mb-1">{{ ucfirst($post->title) }}</h3>
        <p class="blog-post-meta text-muted">
            <span class="post-date">
                <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($post->published_at)->diffForHumans()  }}
            </span>

            <span class="post-author" style="margin-left: 20px;">
                <i class="fa fa-user"></i> By <a href="{{route('user.author.view', $post->author->id)}}">{{$post->author->fullName()}}</a>
            </span>

            <span class="" style="margin-left: 20px;">
                <i class="fas fa-list-alt"></i>
                @foreach ($post->categories as $category)
                    <a href="{{route('user.categories.show', $category->id)}}">{{ucfirst($category->name)}}</a>@if(!$loop->last), @endif
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

    {{-- <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1">Another blog post</h2>
        <p class="blog-post-meta">December 23, 2020 by <a href="#">Jacob</a></p>

        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
        <blockquote>
        <p>Longer quote goes here, maybe with some <strong>emphasized text</strong> in the middle of it.</p>
        </blockquote>
        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
        <h3>Example table</h3>
        <p>And don't forget about tables in these posts:</p>
        <table class="table">
        <thead>
            <tr>
            <th>Name</th>
            <th>Upvotes</th>
            <th>Downvotes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>Alice</td>
            <td>10</td>
            <td>11</td>
            </tr>
            <tr>
            <td>Bob</td>
            <td>4</td>
            <td>3</td>
            </tr>
            <tr>
            <td>Charlie</td>
            <td>7</td>
            <td>9</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
            <td>Totals</td>
            <td>21</td>
            <td>23</td>
            </tr>
        </tfoot>
        </table>

        <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other highly repetitive body text used throughout.</p>
    </article> --}}


    </div>

    @include('usersite.partial.sidebar')
@endsection
