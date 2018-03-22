@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('comments.update', $comment->id)}}" method="post">
        {{csrf_field()}}

        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="podaj swoje imie" value="{{$comment->author}}" name="author">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="content" rows="10" placeholder="dodaj jakis komentarz">{{$comment->content}} </textarea>
        </div>

        <div class="form-group">
            <select name="article_id" class="form-control">
                @foreach($articles as $article)

                    @if($comment->article_id==$article->id)

                        <option selected value="{{$article->id}}"> {{$article->title}}</option>
                    @else
                        <option value="{{$article->id}}"> {{$article->title}}</option>
                    @endif

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary">zapisz</button>
        </div>
    </form>

@endsection