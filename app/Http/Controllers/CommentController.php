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
        return view('comments.create', ['pageTitle' => 'Create Comment Page']);
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
        $comment = Comment::findOrFail($id);

        return view('comments.show', ['comment' => $comment, 'pageTitle' => $comment->title]);
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
