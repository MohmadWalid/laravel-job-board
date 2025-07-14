<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCommentRequest $request, Post $post)
    {
        $post->comments()->create($request->validated());


        return redirect()->route('blog.show', $post)->with('success', 'Comment created.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // @TODO: In the forms section
        return view('comments.edit', ['pageTitle' => 'Edit Comment Page']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // @TODO: In the forms section
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // @TODO: In the forms section
    }
}
