@extends('backend.admin.layout.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Article</h2>
    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Title -->
        <div class="form-group mb-3">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Content -->
        <div class="form-group mb-3">
            <label for="content">Content:</label>
            <textarea name="content" class="form-control">{{ old('content', $article->content) }}</textarea>
            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Author -->
        <div class="form-group mb-3">
            <label for="author_id">Author:</label>
            <select name="author_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('author_id', $article->author_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('author_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Category -->
        <div class="form-group mb-3">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Tags -->
        <div class="form-group mb-3">
            <label for="tags">Tags:</label>
            <select name="tags[]" class="form-control" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $article->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Featured -->
        <div class="form-group mb-3">
            <label for="featured">Featured:</label>
            <input type="checkbox" name="featured" value="1" {{ old('featured', $article->featured) ? 'checked' : '' }}>
            @error('featured') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Slug -->
        <div class="form-group mb-3">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $article->slug) }}">
            @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Image -->
        <div class="form-group mb-3">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control">
            @if($article->image)
                <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" width="100">
            @endif
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Status -->
        <div class="form-group mb-3">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status', $article->status) == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Article</button>
    </form>
</div>
@endsection
