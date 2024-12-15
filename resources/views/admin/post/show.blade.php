{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Link to your custom CSS file -->
</head> --}}
@extends('admin.layouts.layout')
@section('page-css')
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


</style>
@endsection
@section('title', 'Post Details')
@section('page_name', 'Post Details')

@section('content')

    <main class="container">
        <!-- Submit Button -->
        <div class="form-group text-center mt-5 mb-5">
            <a href="{{route('posts.edit', $post->slug)}}" class="btn btn-info">
                <i class="fa fa-edit"></i> Edit
            </a>
             <!-- Delete Button -->
            <form action="{{ route('posts.destroy', $post->slug) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </form>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
        <div class="post-detail mb-5 text-center">
            <!-- Post Title -->
            <h1>{{$post->title}}</h1>



            {{-- <div class="category-image">
                <img width="250px" height="200px" src="{{ $post->getThumbnail() }}" alt="">
            </div> --}}

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
                @if ($post->status == 'published')
                <span class="status" style="margin-left: 20px;">
                    <i class="status"></i> Status: <strong> <i class="text-success fas fa-check-circle"></i> Published</strong>
                </span>
                @elseif ($post->status == 'draft')
                <span class="status-icon" style="margin-left: 20px;">
                    <i class="fa fa-status "></i> Status: <strong> <i class="text-warning fas fa-pencil-alt"></i> Draft</strong>
                </span>
                @elseif ($post->status == 'archived')
                <span class="status" style="margin-left: 20px;">
                    <i class="fa fa-status "></i> Status: <strong><i class="text-danger fas fa-archive"></i> Archived</strong>
                </span>
                @endif
            </p>



            <!-- Post Image -->
            <div class="post-image m-4">
                <img width="500px" height="400px" src="{{ $post->getThumbnail() }}" alt="">
            </div>

            <!-- Post Content -->
            <div class="post-content">
                <p>{{$post->content}}</p>
            </div>

            <!-- Social Share Links -->
            <div class="social-share">
                <p>Share this post:</p>
                <a href="#" class="btn btn-social"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#" class="btn btn-social"><i class="fab fa-facebook-f"></i> Facebook</a>
                <a href="#" class="btn btn-social"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
            </div>
        </div>

            <!-- Comments Section -->
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
                        @if (!$comment->comment_id)
                        <div class="reply-form">
                            <form action="{{ route('comment.store', ['post' => $post->slug]) }}" method="POST">
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
                    </div>
                @endforeach

                <!-- Comment to the Post -->
                <div class="mt-5 ">
                    <h3>Comment to the Post</h3>
                    <div class="comment-form comment-form-container">

                        <form action="{{route('comment.store', ['post' => $post->slug])}}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <div class="form-row">
                                <textarea
                                name="comment"
                                placeholder="Write your comment here..."
                                required></textarea>
                                <button type="submit" class="btn btn-submit">Comment</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

    </main>
@endsection
