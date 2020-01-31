@extends('layouts.app')

@section('content')

<form action="/profile/edit" method="post">
    @csrf
  <span>Content:</span>
  <input type="text" name="content" value="{{$tweet->content}}" required>
  <p>Author:{{Auth::user()->name }}</p>
  <input type="hidden" name="author" value="{{Auth::user()->name }}" required>
  <button type="submit" name="id" value="{{$tweet->id}}">Submit</button>
</form>


@endsection
