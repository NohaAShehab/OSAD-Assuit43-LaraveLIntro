@extends('layouts.app')
@section('name')
    All User from database
@endsection

@section('content')
    <h1> All users </h1>
    <table class="table">
 <th> Nubmer of pages</th>  <th> Image</th>
        <th> Show</th>
        @foreach($users as $user)
            <tr>

                <td> {{$user->id}}</td> <td> {{$user->name}}</td>
                 <td>  <a href="{{route('users.show',$user->id)}}"  class="btn btn-info">  Show</a> </td>

            </tr>
        @endforeach

    </table>

@endsection
