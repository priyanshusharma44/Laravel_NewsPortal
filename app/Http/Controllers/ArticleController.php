<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        // Cache articles sorted by view count
        $articles = Cache::remember('articles.most_viewed', now()->addMinutes(10), function () {
            return Article::with(['category', 'tags'])
                ->orderBy('views_count', 'desc')
                ->get();
        });

        $categories = Category::all();

        return view('backend.NewsArticle.display', compact('articles', 'categories'));
    }

    
    

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all(); // Load all users to select an author
    
        return view('backend.NewsArticle.create', compact('categories', 'tags', 'users'));
    }

    public function show($id)
    {
        $article = Article::with(['category', 'tags', 'author'])->where('id', $id)->firstOrFail();
    
        // Increment the view count
        $article->increment('views_count');
    
        // Clear the cache related to this category
        return view('backend.NewsArticle.detail', compact('article'));
    }
    
    

    public function showByCategory($id)
    {
        $categories = Category::all();
        
        $articles = Cache::remember("articles.category_{$id}.most_viewed", now()->addMinutes(10), function () use ($id) {
            return Article::where('category_id', $id)
                          ->where('status', 'published')
                          ->orderBy('views_count', 'desc')
                          ->get();
        });
    
        return view('index', compact('categories', 'articles'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'author_id' => 'required|exists:users,id',
            'published_at' => 'nullable|date',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required|string|unique:articles,slug',
            'status' => 'required|in:draft,published,archived',
            'category_id' => 'required|exists:categories,id',
            'featured' => 'required|boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $data = $request->all();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $data['featured'] = $request->has('featured') ? true : false;

        $article = Article::create($data);
        $article->tags()->sync($request->tags);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        $users = User::all();

        return view('backend.NewsArticle.edit', compact('article', 'categories', 'tags', 'users'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'author_id' => 'required|exists:users,id',
            'published_at' => 'nullable|date',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required|string|unique:articles,slug,' . $article->id,
            'status' => 'required|in:draft,published,archived',
            'category_id' => 'required|exists:categories,id',
            'featured' => 'required|boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $data = $request->all();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $data['featured'] = $request->has('featured') ? true : false;

        $article->update($data);
        $article->tags()->sync($request->tags);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
    public function articlesByCategory($id)
{
    $articles = Article::where('category_id', $id)->where('status', 'published')->get();
    return response()->json($articles);
}


}
