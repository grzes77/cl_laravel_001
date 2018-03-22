@extends('layouts.app')

@section('title','cos fajnego')

@section('content')

    <a href="{{route('comments.create')}}" class="btn btn-primary">Dodaj</a>
    <hr>
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>author</th>
            <th>content</th>
            <th>article title</th>
            <th>edit</th>
            <th>delete</th>
        </tr>



        @foreach($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->content}}</td>
                <td>

                    @if($comment->article)
                     {{$comment->article->title}}
                    @endif
                </td>
                <td><a href="{{route('comments.edit',$comment)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{route('comments.destroy',$comment->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>

    {{$comments->links()}}

@endsection