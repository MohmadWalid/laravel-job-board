<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Comment;
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
        $posts = Post::withCount('comments')->latest()->cursorPaginate(10);

        // renderring all the posts in the view
        return view('posts.index', ['posts' => $posts, 'pageTitle' => 'Blog']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', ['pageTitle' => 'Blog - Create Post Page']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        $post = new Post();

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->published = $request->has('published');

        $post->save();

        return redirect(route('blog.index'))->with('success', 'Post created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::withCount('comments')
            ->with(['comments' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->findOrFail($id);

        return view('posts.show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post, 'pageTitle' => 'Blog - Edit Post Page: ' . $post->title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->published = $request->has('published');

        $post->save();

        return redirect(route('blog.index'))->with('success', 'The Post has been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect(route('blog.index'))->with('success', 'The Post has been Deleted Successfully.');
    }
}
