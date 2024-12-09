<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.post.index')->with([
           'posts' => Post::with('comment.children')->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.create')->with([
            'categories' => Category::select('id', 'name')->get(),
            'posts' => Post::select('id', 'status')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validationData = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $validationData['thumbnail'] = $request->file('thumbnail')->store('posts', ['disk' => 'public']);
        }


        $post = Post::create($validationData);
        $post->categories()->sync($validationData['categories']);
        $post->tags()->sync($validationData['tags']);

        return redirect()->route('posts.index')->with('success', 'Create Post successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.post.show')->with([
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        return view('admin.post.edit')->with([
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // validated data
        $validationData = $request->validated();

        // update status
        if (isset($validationData['status'])) {
            $post->status = $validationData['status'];
        }

        // update thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $validationData['thumbnail'] = $request->file('thumbnail')->store('posts', ['disk' => 'public']);
        }


        // update slug
        // $validationData['slug'] = $validationData['slug'] ?? str($validationData['title'])->slug();

        $post->update($validationData);

        // update categories
        $post->categories()->sync($validationData['categories'] ?? []);

        // update tags
        $post->tags()->sync($validationData['tags'] ?? []);

        return redirect()->route('posts.index')->with('success', 'Updated Post successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // thumbnail delete
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        // delete povit data
        $post->categories()->detach();
        $post->tags()->detach();

        // delete post
        $post->delete();

        return redirect()->route('posts.index')->with('warnign', 'Post Delete successfully!');
    }
}
