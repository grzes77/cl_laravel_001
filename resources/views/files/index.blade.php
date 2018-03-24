@extends('layouts.app')

@section('title','cos fajnego')

@section('content')

    <a href="{{route('files.create')}}" class="btn btn-primary">Dodaj</a>
    <hr>
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>image</th>

            <th>edit</th>
            <th>delete</th>
        </tr>

        @foreach($files as $file)
            <tr>
                <td>{{$file->id}}</td>


                <td>

                    <img with="200" src="/storage/thumb/{{$file->file_name}}"/>
                </td>


                <td><a href="{{route('files.edit',$file)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{route('files.destroy',$file->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>

    {{$files->links()}}

@endsection