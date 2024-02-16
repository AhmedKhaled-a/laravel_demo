@extends('layouts.main')

@section('title', 'All Posts')

@section('content')
    <div class="container mt-5">
        <h1>Posts</h1>

        @if ($posts->isEmpty())
            <p>No posts found.</p>
        @else
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Published At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>{{ $post->published_at}}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            

            {{ $posts->links() }}
        @endif
        <a href="{{route('posts.create')}}" class="btn btn-dark">new post</a >
    </div>
@endsection
