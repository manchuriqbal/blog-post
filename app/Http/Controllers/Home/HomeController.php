<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Featured Post
        $featuredPost = Post::where('featured_post', true)
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->first();

        // Featured Post
        $featuredPosts = Post::where('featured_post', true)
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->skip(1)
            ->take(2)
            ->get();

        // posts
        $posts = Post::where('status', 'published')->latest()->paginate(10);

        return view('usersite.home.index', [
            'featuredpost' => $featuredPost,
            'featuredposts' => $featuredPosts,
            'posts' => $posts,
        ]);
    }
}
