@extends('layouts.app')

@section('title','cos fajnego')

@section('content')

    <a href="{{route('articles.create')}}" class="btn btn-primary">Dodaj</a>
    <hr>
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>body</th>
            <th>category</th>
            <th>edit</th>
            <th>delete</th>
        </tr>

        @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->body}}</td>
                <td>
                    @if($article->category)
                        {{$article->category->name}}
                    @endif

                </td>
                <td><a href="{{route('articles.edit',$article)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{route('articles.destroy',$article->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>

    {{$articles->links()}}

@endsection