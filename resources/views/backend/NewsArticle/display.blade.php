@extends('backend.admin.layout.master')

@section('content')
<div class="container mt-5">
    <h2>Articles</h2>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Create New Article</a>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th>Featured</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>{{ $article->author->name }}</td>
                    <td>{{ ucfirst($article->status) }}</td>
                    <td>{{ $article->featured ? 'Yes' : 'No' }}</td>
                    <td>
                        @if($article->image)
                            <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" width="100">
                        @else
                            No Image
                        @endif     
                    </td>
                    <td>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('article.single', $article->id) }}" class="btn btn-warning btn-sm">show</a>

                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this article?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
