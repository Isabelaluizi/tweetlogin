@extends('layouts.app')

@section('content')
@guest
<p> Go Sign Up!</p>
@else

<p id="welcomeMessage"> Welcome {{Auth::user()->name}}</p>

@foreach ($tweets as $tweet)
    <p class="tweetContent"> {{$tweet->content}}</p>
    <p class="tweetauthor"><strong>{{$tweet->author}}</strong> </p>
    @if (Auth::user()->name==$tweet->author)
   <form action="/editFormPost" method="post">
    @csrf
   <button type="submit" name= "id" value="{{$tweet->id}}">Edit</button>
   </form>
   <form action="/profile/delete" method="post">
    @csrf
   <button type="submit" name= "id" value="{{$tweet->id}}">Delete</button>
    </form>
   @endif
@endforeach
<form action="/profile" method="post">
    @csrf
    <p>Create new post:</p>
    <span>Content:</span>
   <input type="text" name="content" value="{{ old('content') }}">
    @if ($errors->has('content'))
    <p>{{$errors->first('content')}}</p>
    @endif
    <p>Author: {{Auth::user()->name }}</p>
    <button type="text" name="author" value="{{ Auth::user()->name }}">Submit</button>
    </form>
@endguest
@endsection
