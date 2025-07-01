<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all comment from the Database
        $comments = Comment::all();

        // renderring all the comment in the view
        return view('comments.index', ['comments' => $comments, 'pageTitle' => 'Blog']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Comment::create([
        //     'author' => 'Lido',
        //     'body' => 'First Comment to write here',
        //     'post_id' => 201
        // ]);

        Comment::factory(50)->create();

        return redirect(route('comments.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.show', ['comment' => $comment, 'pageTitle' => $comment->title]);
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
    public function update(Request $request, Comment $comment)
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
