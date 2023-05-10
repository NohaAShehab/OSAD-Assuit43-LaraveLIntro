@extends('layouts.app')
@section('title')
    All products from database
@endsection

@section('content')
    <h1> {{$article->title}} Info</h1>
    <div class="card" style="width: 18rem;">
        <img src="{{asset('images/articles/'.$article->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p class="card-text">No_of_pages: {{$article->no_of_pages}}</p>
            <p class="card-text">Created_at: {{$article->created_at}}</p>
            <p class="card-text">Updated_at: {{$article->updated_at}}</p>
            <a href="{{route('articles.index')}}" class="btn btn-primary">Back to all articles </a>
        </div>
    </div>
    <h1> {{$article['title']}}</h1>
    @if($article->user)
        @dump($article->user)
        {{$article->user->email}}
    @endif
@endsection
