@extends('layouts.app')
@section('title')
    All products from database
@endsection

@section('content')
    <h1> {{$user->name}} Info</h1>
    @if(count($user->articles))
{{--        @dump($user->articles)--}}
        <h1> Article wirtten by this user </h1>
        @foreach($user->articles as $article)
            <li> <a href="{{route('articles.show', $article->id)}}"> {{$article->title}}</a></li>
        @endforeach
    @endif

@endsection
