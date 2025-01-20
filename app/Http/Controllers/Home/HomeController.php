<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        // dd(Storage::url($this->thumbnail));
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
