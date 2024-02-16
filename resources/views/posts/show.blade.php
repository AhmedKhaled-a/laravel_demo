@extends('layouts.main')

@section('title', 'View Post')

@section('content')
    <h1> {{ $post->user->name }}'s post</h1>

    <div>
        <h3>Title: {{ $post->title }}</h3>
        <p>Body: {{ $post->body }}</p>
        <p>Author: {{ $post->user->name }}</p>
    </div>
@endsection
