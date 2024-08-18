<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch data from the database
        $articles = Article::latest()->limit(10)->get();
        $categories = Category::all();
        $comments = Comment::latest()->limit(5)->get();

        // Pass the data to the view
        return view('frontend.index', [
            'articles' => $articles,
            'categories' => $categories,
            'comments' => $comments
        ]);
    }
}
