@extends('layouts.app')
@section('title')
    Create Book
@endsection


@section('content')
    {{Auth::user()}}


    <h1> Create Book </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
        @method('post')
        @csrf

        <div class="mb-3">
            <label class="form-label">Book Title</label>
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
            <label for="exampleInputEmail1" class="form-label">Book Image</label>
            <input type="file"
                    name='image' class="form-control" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
