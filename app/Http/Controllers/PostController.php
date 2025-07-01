<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        // Get all posts from the Database
        $posts = Post::cursorPaginate(5);

        // renderring all the posts in the view
        return view('posts.index', ['posts' => $posts, 'pageTitle' => 'Blog']);
    }

    function create()
    {
        // Post::create([
        //     'title' => 'Test',
        //     'author' => 'Lido',
        //     'body' => 'Awesome',
        //     'published' => true
        // ]);

        Post::factory(100)->create();

        return redirect(route('blogs.index'));
    }

    function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', ['post' => $post, 'pageTitle' => $post->title]);
    }
}
