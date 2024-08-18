@extends('backend.admin.layout.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Comments</h1>
    <a href="{{ route('comments.create') }}" class="btn btn-primary mb-3">Add New Comment</a>
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach($comments as $comment)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Comment ID: {{ $comment->id }}</h5>
                            <p class="card-text"><strong>Content:</strong> {{ $comment->content }}</p>
                            <p class="card-text"><strong>Article:</strong> {{ $comment->article->title }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
