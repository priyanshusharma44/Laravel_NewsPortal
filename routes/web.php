<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ArticleController,
    CategoryController,
    CommentController,
    FrontendController,
    TagController,
    HomeController
};
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Public Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

// Route for displaying an individual article
Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Authentication Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('public.register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('public.register.store');

// Logout Route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Protected Backend Routes
Route::middleware('auth')->prefix('backend')->group(function () {
    Route::get('dashboard', function () {
        return view('backend.admin.dashboard');
    })->name('admin.dashboard');

    // Articles
    // Routes/web.php
Route::get('/backend/articles', [ArticleController::class, 'backendIndex'])->name('articles.backend.index');
// routes/web.php
// In routes/web.php

Route::middleware('auth')->prefix('backend')->group(function () {
    // Articles
    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('articles/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('articles/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/update/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::get('/article/{slug}', [FrontendController::class, 'single'])->name('frontend.single');
    Route::get('/article/show/{id}', [ArticleController::class, 'show'])->name('article.single');



});

    

    // Comments
    Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
    Route::get('comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('comments/store', [CommentController::class, 'store'])->name('comments.store');
    Route::get('comments/edit/{comment}', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('comments/update/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/destroy/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Categories


    Route::middleware('auth')->prefix('backend')->group(function () {
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
    

    // Tags
    Route::get('tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('tags/store', [TagController::class, 'store'])->name('tags.store');
    Route::get('tags/edit/{tag}', [TagController::class, 'edit'])->name('tags.edit');
    Route::put('tags/update/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('tags/destroy/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
});
