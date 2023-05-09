@extends('layouts.app')
@section('title')
    Create product
@endsection

@section('body')
    please submit your data
@endsection


@section('content')

    <h1> Create products </h1>

    @if ($errors->any())
{{--        @dump($errors)--}}
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/products" enctype="multipart/form-data">
        @method('post')
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product name</label>
            <input type="text" class="form-control"
                   value="{{ old('name') }}"
                   name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product price</label>
            <input type="number"
                   value="{{ old('price') }}" name='price' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Image</label>
            <input type="file"
                    name='image' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
