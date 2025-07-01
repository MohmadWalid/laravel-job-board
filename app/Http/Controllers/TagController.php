<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index()
    {
        // Get all tags from the Database
        $tags = Tag::all();

        // renderring all the tags in the view
        return view('tags.index', ['tags' => $tags, 'pageTitle' => 'Tags']);
    }

    function create()
    {
        Tag::factory(10)->create();
        return redirect(route('tags.index'));
    }

    function test_manyToMany()
    {
        // $post218 = Post::findOrFail(218);
        // $post201 = Post::findOrFail(201);

        // $post201->tags()->attach([1, 3]);
        // $post218->tags()->attach([1]);

        // return response()->json(([
        //     'post201' => $post201->tags,
        //     'post218' => $post218->tags
        // ]));

        Tag::factory(10)->create();
        return redirect(route('tags.index'));
    }
}
