@extends('layouts.main')

@section('title', 'Edit Post')

@section('content')
    <div class="container">
    <h1>Edit Post</h1>

<form action="{{ route('posts.update', $post->id) }}" method="POST" class="w-50 mx-auto">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $post->title }}">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" name="body" rows="3" placeholder="Enter body">{{ $post->body }}</textarea>
    </div>
    <div class="form-group mb-3">
        <label for="user_id">Author</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
@endsection
