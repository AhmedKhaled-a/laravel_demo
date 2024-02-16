@extends('layouts.main')

@section('title','show user')

@section('content')
<h2>ID : {{ $user -> id }}</h2>
<h2>Name : {{ $user -> name }}</h2>
<h2>Email : {{$user -> email}}</h2>
<h2>Created at : {{$user -> email_verified_at}}</h2>
@endsection