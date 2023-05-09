@extends('layouts.app')
@section('title')
    All products from database
@endsection

{{--@dd($products)  --}}

{{--@dump($products)--}}
@section('content')
    <h1> {{$product->name}} Info</h1>
    <div class="card" style="width: 18rem;">
        <img src="{{asset('images/products/'.$product->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">Price: {{$product->price}}</p>
            <p class="card-text">Created_at: {{$product->created_at}}</p>
            <p class="card-text">Updated_at: {{$product->updated_at}}</p>
            <a href="{{route('products.index')}}" class="btn btn-primary">Back to all proudcts </a>
        </div>
    </div>

    <img src="{{asset('images/products/'.$product->image)}}" >
@endsection
