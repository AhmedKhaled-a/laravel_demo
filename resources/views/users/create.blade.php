@extends('layouts.main')
@section('title','create user')

@section('content')


<form method="POST" action="{{route('users.store',false)}}">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control"   name="name">
    @error('name')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control"  aria-describedby="emailHelp" name="email">
    @error('email')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control"  name="password">
    @error('password')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

{{--
  @if($errors -> any())
  @foreach ($errors ->all() as $error)
    <p>{{$error}}</p>
  @endforeach
@endif
  --}}
@endsection