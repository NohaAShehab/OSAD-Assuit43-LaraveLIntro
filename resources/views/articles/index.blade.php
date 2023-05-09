@extends('layouts.app')
@section('title')
    All Articles from database
@endsection

@section('content')
    <h1> All Articles </h1>
    <table class="table">

        <tr> <th> ID</th> <th> Title</th> <th> Nubmer of pages</th>  <th> Image</th>
        <th> Show</th> <th> Edit</th> <th> Delete</th> </tr>
        @foreach($articles as $article)
            <tr>

                <td> {{$article->id}}</td> <td> {{$article->title}}</td> <td>{{$article->no_of_pages}}</td>
                <td> <img width="100" height="100" src="{{asset('images/articles/'.$article->image)}}"></td>
                 <td>  <a href="{{route('articles.show',$article->id)}}"  class="btn btn-info">  Show</a> </td>
                <td>  <a href="{{route('articles.edit', $article->id)}}"  class="btn btn-warning">  Edit</a> </td>
                <td>
                    <form method="post"  action="{{route('articles.destroy', $article->id)}}">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>

                </td>
            </tr>
        @endforeach

    </table>

    <td>  <a href="{{route('articles.create')}}"  class="btn btn-primary">  Create Article</a> </td>
@endsection
