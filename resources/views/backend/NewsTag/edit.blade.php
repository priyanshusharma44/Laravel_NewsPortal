@extends('backend.admin.layout.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Tag</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tags.update', $tag->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Tag Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $tag->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
