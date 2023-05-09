@extends('layouts.app')
@section('title')
    Create Article
@endsection


@section('content')

    <h1> Create Article </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
        @method('post')
        @csrf

        <div class="mb-3">
            <label class="form-label">Article Title</label>
            <input type="text" class="form-control"
                   value="{{ old('title') }}"
                   name="title"  aria-describedby="emailHelp">
        </div>

        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control"
                   value="{{ old('description') }}"
                   name="description"  aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Number of pages </label>
            <input type="number"
                   value="{{ old('no_of_pages') }}" name='no_of_pages' class="form-control" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Article Image</label>
            <input type="file"
                    name='image' class="form-control" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Users</label>
            <select class="form-select" name="user_id" aria-label="Default select example">
                <option selected disabled>Open this select menu</option>
                @foreach($users as  $user)
                    <option value="{{$user->id}}"> {{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
