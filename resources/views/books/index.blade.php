@extends('layouts.app')
@section('title')
    All Books from database
@endsection



{{--@dd($products)  --}}

{{--@dump($products)--}}
@section('content')
    @auth()
        <h2> Welcome {{Auth::user()->name}}</h2>
    @endauth
    <h1> All Books </h1>
    <table class="table">

        <tr> <th> ID</th> <th> Title</th> <th> Nubmer of pages</th>  <th> Image</th>
        <th> Show</th> <th> Edit</th> <th> Delete</th> </tr>
        @foreach($books as $book)
            <tr>

                <td> {{$book->id}}</td> <td> {{$book->title}}</td> <td>{{$book->no_of_pages}}</td>
                <td> <img width="100" height="100" src="{{asset('images/books/'.$book->image)}}"></td>
                 <td>  <a href="{{route('books.show',$book->id)}}"  class="btn btn-info">  Show</a> </td>
{{--
   <td>  <a href="{{route('books.edit', $book->id)}}"  class="btn btn-warning">  Edit</a> </td>--}}
                <td>
                @can('update-book', $book)
                    <a href="{{route('books.edit', $book->id)}}" class="btn btn-warning">Edit </a>
                @endcan
                </td>
                <td>
                    <form method="post"  action="{{route('books.destroy', $book->id)}}">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>

                </td>
            </tr>
        @endforeach

    </table>
    <div>
        {{$books->links()}}
    </div>
    <td>  <a href="{{route('books.create')}}"  class="btn btn-primary">  Create Book</a> </td>
@endsection
