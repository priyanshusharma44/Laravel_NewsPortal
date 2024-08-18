@extends('backend.admin.layout.master')

@section('content')
<div class="container mt-5">
    <h2>Create New Article</h2>
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Content -->
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" class="form-control">{{ old('content') }}</textarea>
            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Author -->
        <div class="form-group">
            <label for="author_id">Author:</label>
            <select name="author_id" class="form-control">
                <option value="">Select Author</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('author_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('author_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Category -->
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Tags -->
        <div class="form-group">
            <label for="tags">Tags:</label>
            <select name="tags[]" class="form-control" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Featured -->
        <div class="form-group">
            <label for="featured">Featured:</label>
            <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
            @error('featured') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Slug -->
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
            @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Image -->
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Article</button>
    </form>
</div>
@endsection
