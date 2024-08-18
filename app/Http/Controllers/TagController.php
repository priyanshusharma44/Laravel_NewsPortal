<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Display a list of all tags
    public function index()
    {
        $tags = Tag::all(); // Retrieve all tags
        return view('backend.NewsTag.display', compact('tags'));
    }

    // Show the form for creating a new tag
    public function create()
    {
        return view('backend.NewsTag.create');
    }

    // Store a newly created tag in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        Tag::create($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    // Show the form for editing an existing tag
    public function edit(Tag $tag)
    {
        return view('backend.NewsTag.edit', compact('tag'));
    }

    // Update the specified tag in the database
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tag->id,
        ]);

        $tag->update($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    // Remove the specified tag from the database
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
