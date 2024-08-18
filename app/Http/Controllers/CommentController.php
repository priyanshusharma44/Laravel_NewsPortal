<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('article')->get();
        return view('backend.NewsComment.display', compact('comments'));
    }

    public function create()
    {
        $articles = Article::all();
        return view('backend.NewsComment.create', compact('articles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ]);

        Comment::create($request->all());
        return redirect()->route('comments.index')->with('success', 'Comment created successfully.');
    }

    public function edit(Comment $comment)
    {
        // dd($comment);
        $articles = Article::all();
        return view('backend.NewsComment.edit', compact('comment', 'articles'));
    }
    
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ]);
    
        $comment->update($request->only(['content', 'article_id']));
    
        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }
    
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
    
}
