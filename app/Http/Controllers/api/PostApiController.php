<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use Illuminate\Http\Request;
// #TODO: API Resources
class PostApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the data from the database
        $post = Post::paginate(10);

        // Return the response including the posts
        return response($post, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'body' => 'required|string',
            'published' => 'required|boolean',
        ]);

        // Create a new Post instance
        $post = Post::create($validated);

        // Return the response including the created data
        return response([
            'data' => $post,
            'message' => 'Post retrieved successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return response($post, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
            'body' => 'sometimes|required|string',
            'published' => 'sometimes|required|boolean',
        ]);

        $post->update($validated);

        return response([
            'data' => $post,
            'message' => 'Post updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return response([
            'message' => 'Post deleted successfully'
        ], 200);
    }
}
