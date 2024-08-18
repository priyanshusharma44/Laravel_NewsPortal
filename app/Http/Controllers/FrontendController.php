<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category; // Import the Category model
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    public function index()
    {
        // Retrieve articles and categories with caching
        $articles = Cache::remember('articles.most_viewed', now()->addMinutes(10), function () {
            return Article::with(['category', 'tags'])
                ->orderBy('views_count', 'desc')
                ->get();
        });
    
        // Retrieve all categories
        $categories = Category::all();
    
        // Pass both articles and categories to the view
        return view('frontend.index', compact('articles', 'categories'));
    }
    
}
