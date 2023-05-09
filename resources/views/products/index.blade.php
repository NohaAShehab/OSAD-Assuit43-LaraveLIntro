@extends('layouts.app')
@section('title')
    All products from database
@endsection

{{--@dd($products)  --}}

{{--@dump($products)--}}
@section('content')
    <h1> All products </h1>
    <table class="table">

        <tr> <th> ID</th> <th> Name</th> <th> Price</th>  <th> Image</th>
        <th> Show</th> <th> Edit</th> <th> Delete</th> </tr>
        @foreach($products as $product)
{{--            @dump($product)--}}
            <tr>

                <td> {{$product->id}}</td> <td> {{$product->name}}</td> <td>{{$product->price}}</td>
                <td> <img width="100" height="100" src="{{asset('images/products/'.$product->image)}}"></td>
                 <td>  <a href="{{route('products.show',$product->id)}}"  class="btn btn-info">  Show</a> </td>
                <td>  <a href=""  class="btn btn-warning">  Edit</a> </td>
                <td>  <a href="{{route('products.destroy', $product->id)}}"  class="btn btn-danger">  Delete</a> </td>
            </tr>
        @endforeach

    </table>

    <td>  <a href="{{route('products.create')}}"  class="btn btn-primary">  Create product</a> </td>
@endsection
