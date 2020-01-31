@extends('layouts.app')

@section('content')

@foreach ($tweets as $tweet)
    <p> {{$tweet->content}}</p>
    <p><strong>{{$tweet->author}}</strong> </p>
@endforeach

@endsection
