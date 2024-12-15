@extends('usersite.layouts.layout')
@section('custom-css')
<style>
    .comment-form-container {
        display: flex;
        justify-content: left;
        align-items: left;
    }


    .comment-form .form-row {
        display: flex;
        align-items: left;
        gap: 10px;
    }

    .comment-form textarea {
        /* flex: 1; */
        width: 350px;
        height: 80px ;
        resize: none;
    }

    .comment-form button {
        height: 40px;
        padding: 0 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 40px;
    }

    .comment-form button:hover {
        background-color: #0056b3;
    }


    .reply-form .form-row {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .reply-form textarea {
        /* flex: 1; */
        width: 200px;
        height: 50px ;
        resize: none;
    }

    .reply-form button {
        height: 40px;
        padding: 0 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .reply-form button:hover {
        background-color: #0056b3;
    }
    .border-reply {
        border-style: solid;
        border-color: rgb(34, 34, 34);
    }

    .btn-foursquare{
        color: white;
    }


</style>
@endsection
@section('title', 'Post Details')

@section('content')
<div class="col-md-8">
    <div class="post-detail mb-5 text-center">
        <!-- Post Title -->
        <h1>{{$post->title}}</h1>


        <!-- Post Published Date -->
        <p class="post-meta">
            <span class="post-date">
                <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($post->published_at)->format('d-m-Y') }}
            </span>
            <span class="post-author" style="margin-left: 20px;">
                <i class="fa fa-user"></i> By <strong>{{$post->author->fullName()}}</strong>
            </span>
            <span class="post-categories" style="margin-left: 20px;">
                <i class="fa fa-tags"></i> Categories:
                @foreach ($post->categories as $category)
                    <a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>@if(!$loop->last), @endif
                @endforeach
            </span>
        </p>



        <!-- Post Image -->
        <div class="post-image m-4">
            <img width="500px" height="400px" src="{{ $post->getThumbnail() }}" alt="">
        </div>

        <!-- Post Content -->
        <div class="post-content">
            <p>{{$post->content}}</p>
        </div>

        {{-- Tags --}}
        <div class="tags">
            <p>
                <span class="post-categories" style="margin-left: 20px;">
                    <strong>Tags : </strong>
                    @foreach ($post->tags as $tag)
                    <i class="fa fa-tags"></i>
                        <a href="">{{$tag->name}}</a>@if(!$loop->last), @endif
                    @endforeach
                </span>
            </p>
        </div>

        <!-- Social Share Links -->
        <div class="social-share">
            <p>Share this post:</p>
            <a href="#" class="btn btn-foursquare"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#" class="btn btn-foursquare"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="#" class="btn btn-foursquare"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
        </div>
    </div>

        <!-- Replies Section -->
        <div class="comments-section mb-5">
            <h2 class="text-center">Comments ({{ $post->comment->count() }})</h2>

            @foreach ($post->comment as $comment)
                <div class="comment ">
                    <!-- Parent Comment -->
                    @if (!$comment->comment_id)
                    <div class="mb-4 mt-4 border-reply p-3">
                        <p>
                            <i class="fas fa-user-circle" style="font-size: 20px; color: #333;"></i>
                            <strong>{{ $comment->user->fullName() }}</strong>

                        </p>
                        <p class="text-white font-weight-bold">{{ $comment->comment }}</p>
                        <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    @endif

                    <!-- Nested Replies -->
                    @if ($comment->children->count() > 0)
                        <div class="replies">
                            @foreach ($comment->children as $reply)
                                <div class="reply ml-5 mb-4">
                                    <p>
                                        <i class="fas fa-user-circle" style="font-size: 20px; color: #333;"></i>
                                        <strong>{{ $reply->user->fullName() }}</strong>
                                    </p>
                                    <p class="text-white font-weight-bold">{{ $reply->comment }}</p>
                                    <span class="comment-date">{{ $reply->created_at->diffForHumans() }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Reply to Comment -->
                    @auth
                    @if (!$comment->comment_id)
                    <div class="reply-form">
                        <form action="{{ route('user.comment.store', ['post' => $post->slug]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <div class="form-row">
                                <textarea
                                name="comment"
                                placeholder="Write your reply here..."
                                required></textarea>
                                <button type="submit" class="btn btn-reply">Reply</button>
                            </div>
                            </form>
                    </div>
                    @endif
                    @endauth
                </div>
            @endforeach

            <!-- Comment to the Post -->
            @auth
            <div class="mt-5 ">
                <h3>Comment to the Post</h3>
                <div class="comment-form comment-form-container">

                    <form action="{{route('user.comment.store', ['post' => $post->slug])}}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="form-row">
                            <textarea
                            name="comment"
                            placeholder="Write your comment here..."
                            required></textarea>
                            <button type="submit" class="btn btn-submit">Commnet</button>
                        </div>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
    @include('usersite.partial.sidebar')
@endsection
