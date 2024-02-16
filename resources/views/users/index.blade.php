
@extends('layouts.main')

@section('title','index page title')

@section('content')
<table class="table table-dark text-center">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>posts number</th>
        <th>Action</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user -> id }}</td>
            <td><a href="{{ route('users.show', ['id'=>$user['id']], false) }}">{{ $user -> name }}</a></td>
            <td>{{ $user -> email }}</td>
            <td>{{$user->posts_count}}</td>
            <td>
                <a href="{{ route('users.edit', ['id'=>$user['id']], false) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            
        </tr>
    @endforeach
</table>
<a href="{{route('users.create')}}" class="btn btn-dark">new user</a >
@endsection