@extends('layouts.app')

@section('content')
@guest
<p> Go Sign Up!</p>
@else

<p> Welcome {{Auth::user()->name}}</p>

@foreach ($tweets as $tweet)
    <p> {{$tweet->content}}</p>
    <p><strong>{{$tweet->author}}</strong> </p>
   <form action="/editFormPost" method="post">
    @csrf
   <button type="submit" name= "id" value="{{$tweet->id}}">Edit</button>
   </form>
@endforeach
<form action="{{route}}" method="post">
    @csrf
    <p>Create new post:</p>
    <span>Content:</span>
   <input type="text" name="content" value="{{ old('content') }}">
    @if ($errors->has('content'))
    <p>{{$errors->first('content')}}</p>
    @endif
    <span>Author:</span>
    <input type="text" name="author" value="{{ old('author') }}">
    @if ($errors->has('author'))
    <p>{{$errors->first('author')}}</p>
    @endif
    <input type="submit" value="submit">
    </form>
@endguest
@endsection
