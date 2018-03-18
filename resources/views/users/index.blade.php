@extends('layouts.app')

@section('title','cos fajnego')

@section('content')

    <a href="{{route('users.create')}}" class="btn btn-primary">Dodaj</a>
    <hr>
<table class="table table-hover">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>edit</th>
        <th>delete</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
        <td>
            <form action="{{route('users.destroy',$user->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger" >Delete</button>
            </form>
        </td>
    </tr>

    @endforeach

</table>

    {{--{{$users->links()}}--}}

@endsection