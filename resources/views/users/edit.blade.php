@extends('layouts.app')
@section('title')
    Create article
@endsection


@section('content')

    <h1> Edit article </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('articles.update', $article->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label class="form-label">article Title</label>
            <input type="text" class="form-control"
                   value="{{$article->title}}"
                   name="title"  aria-describedby="emailHelp">
        </div>

        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control"
                   value="{{ $article->description }}"
                   name="description"  aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Number of pages </label>
            <input type="number"
                   value="{{$article->no_of_pages  }}" name='no_of_pages' class="form-control" aria-describedby="emailHelp">
        </div>

        @if($article->image)
        <div class="mb-3">
            <label class="form-label">old image</label>
            <img src="{{asset('images/articles/'.$article->image)}}">
        </div>
        @endif

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">article Image</label>
            <input type="file"
                    name='image' class="form-control" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Users</label>
            <select class="form-select" name="user_id" aria-label="Default select example">
                <option selected disabled>Open this select menu</option>
                @foreach($users as  $user)
                    @if($user->id == $article->user_id)
                        <option value="{{$user->id}}" selected> {{$user->name}}</option>
                    @else
                        <option value="{{$user->id}}" > {{$user->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
