<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {

        // posts
        $posts = Post::where('status', 'published')->latest()->paginate(10);

        return view('usersite.posts.index')->with([
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('usersite.posts.show', [
            'post' => $post->load('comment.children.user'),
        ]);
    }
}
