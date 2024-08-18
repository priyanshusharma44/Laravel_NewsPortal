@extends('backend.admin.layout.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Comment</h1>
    <div class="card p-4">
        <div class="card-body">
            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="content">Comment Content</label>
                    <textarea id="content" name="content" class="form-control" rows="4" required>{{ $comment->content }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="article_id">Article</label>
                    <select id="article_id" name="article_id" class="form-control" required>
                        @foreach($articles as $article)
                        <option value="{{ $article->id }}" {{ $comment->article_id == $article->id ? 'selected' : '' }}>{{ $article->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
