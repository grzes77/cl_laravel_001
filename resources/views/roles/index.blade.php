@extends('layouts.app')

@section('title','cos fajnego')

@section('content')

    <a href="{{route('roles.create')}}" class="btn btn-primary">Dodaj</a>
    <hr>
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>edit</th>
            <th>delete</th>
        </tr>

        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td><a href="{{route('roles.edit',$role)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{route('roles.destroy',$role->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>

    {{$roles->links()}}

@endsection