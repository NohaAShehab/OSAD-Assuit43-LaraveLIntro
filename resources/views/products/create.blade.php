@extends('layouts.app')
@section('title')
    Create product
@endsection

@section('body')
    please submit your data
@endsection


@section('content')

    <h1> Create products </h1>
    <form method="POST" action="/products">
        @method('post')
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product price</label>
            <input type="number"  name='price' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
