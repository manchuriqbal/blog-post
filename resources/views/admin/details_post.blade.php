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
@section('title', 'Post Details')
@section('page_name', 'Post Details')

@section('content')

    <main class="container">
        <div class="post-detail">
            <!-- Post Title -->
            <h1>{{$post->title}}</h1>

            <!-- Post Published Date -->
            <p class="post-date">
                <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($post->published_at)->format('d-m-Y') }}

            </p>

            <!-- Post Author -->
            <p class="post-author">
                <i class="fa fa-user"></i> By <strong>{{$post->author->fullName()}}</strong>
            </p>

            <!-- Post Categories -->
            <p class="post-categories">
                <i class="fa fa-tags"></i> Categories:
                @foreach ($post->categories as $category)
                <a href="">{{$category->name}}</a>,
                @endforeach
            </p>

            <!-- Post Image -->
            <div class="post-image">
                <img src="path/to/image.jpg" alt="Post Title">
            </div>

            <!-- Post Content -->
            <div class="post-content">
                <p>This is the post content. Here you will add all the details about the post.</p>
            </div>

            <!-- Social Share Links -->
            <div class="social-share">
                <p>Share this post:</p>
                <a href="#" class="btn btn-social"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#" class="btn btn-social"><i class="fab fa-facebook-f"></i> Facebook</a>
                <a href="#" class="btn btn-social"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
            </div>

            <!-- Comments Section -->
            <div class="comments-section">
                <h2>Comments (3)</h2>

                <div class="comment">
                    <p><strong>John Doe</strong> <span class="comment-date">2 hours ago</span></p>
                    <p>This is a comment on the post. It can be as long as needed.</p>
                </div>

                <div class="comment">
                    <p><strong>Jane Smith</strong> <span class="comment-date">1 day ago</span></p>
                    <p>Another comment on the post.</p>
                </div>

                <div class="comment-form">
                    <h3>Leave a Comment</h3>
                    <form action="#" method="POST">
                        <textarea name="comment" placeholder="Write your comment here..." required></textarea>
                        <button type="submit" class="btn btn-submit">Post Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
