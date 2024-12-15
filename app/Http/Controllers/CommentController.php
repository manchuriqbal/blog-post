<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Post $post)
    {
        // validated data
        $validationData = $request->validated();

        $commentId = $validationData['comment_id'] ?? null;

        // create comment
        $comment = $post->comment()->create([
            'comment' => $validationData['comment'],
            'post_id' => $validationData['post_id'],
            'user_id' => auth()->id(),
            'comment_id' => $commentId ?: null,
        ]);

        // redirect page
        if ($comment) {
            return redirect()->back()->with('success', 'Comment added successfully!');
        }
        else {
            return redirect()->back()->with('error', 'Failed to add comment. Please try again!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
