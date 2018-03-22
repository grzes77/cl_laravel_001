@extends('layouts.app')

@section('title','cos fajnego')

@section('content')

    <a href="{{route('categories.create')}}" class="btn btn-primary">Dodaj</a>
    <hr>
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>edit</th>
            <th>delete</th>
        </tr>

        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><a href="{{route('categories.edit',$category)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{route('categories.destroy',$category->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>

    {{$categories->links()}}

@endsection