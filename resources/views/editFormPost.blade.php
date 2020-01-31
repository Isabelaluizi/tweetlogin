@extends('layouts.app')

@section('content')

<form action="/profile/edit" method="post">
    @csrf
  <span>Content:<span>
  <input type="text" name="content" value="{{$tweet->content}}" required>
  <span>Author:<span>
  <input type="text" name="author" value="{{$tweet->author}}" required>
  <button type="submit" name="id" value="{{$tweet->id}}">Submit</button>
</form>


@endsection
