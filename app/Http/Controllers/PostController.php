<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all posts from the Database
        $posts = Post::cursorPaginate(5);

        // renderring all the posts in the view
        return view('posts.index', ['posts' => $posts, 'pageTitle' => 'Blog']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // @TODO: In the forms section
        return view('posts.create', ['pageTitle' => 'Blog - Create Post Page']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // @TODO: In the forms section
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // @TODO: In the forms section
        return view('posts.edit', ['pageTitle' => 'Blog - Edit Post Page']);
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
