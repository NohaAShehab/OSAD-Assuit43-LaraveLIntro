@extends('layouts.app')
@section('title')
    All products from database
@endsection

@section('content')
    <h1> {{$book->title}} Info</h1>
    <div class="card" style="width: 18rem;">
        <img src="{{asset('images/books/'.$book->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$book->title}}</h5>
            <p class="card-text">No_of_pages: {{$book->no_of_pages}}</p>
            <p class="card-text">Created_at: {{$book->created_at}}</p>
            <p class="card-text">Updated_at: {{$book->updated_at}}</p>
            @can('update-book', $book , Auth::user())
                <a href="{{route('books.edit', $book->id)}}" class="btn btn-warning">Edit </a>
            @endcan
            <a href="{{route('books.index')}}" class="btn btn-primary">Back to all books </a>
        </div>
    </div>

@endsection
