<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all tags from the Database
        $tags = Tag::all();

        // renderring all the tags in the view
        return view('tags.index', ['tags' => $tags, 'pageTitle' => 'Tags']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tag::factory(10)->create();
        // return redirect(route('tags.index'));
        // @TODO: Create Tags and connect them to exict tags
        return view('tags.create', ['pageTitle' => 'Blog - Create Tag Page']);
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
        $tag = Tag::findOrFail($id);
        return view('tags.show', ['tag' => $tag, 'pageTitle' => 'Blog - Show Tag Page']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // @TODO: In the forms section
        return view('tags.edit', ['pageTitle' => 'Blog - Edit Tag Page']);
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
