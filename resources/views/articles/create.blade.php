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


    <form action="{{route('articles.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <input placeholder="dodaj nowy tytul" type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="body" rows="10" placeholder="dodaj jaki artykuł"> </textarea>
        </div>

        <div class="form-group">

            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary">zapisz</button>
        </div>
    </form>






@endsection