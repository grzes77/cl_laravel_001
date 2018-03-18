@extends('layouts.app')

@section('content')

    <form action="{{route('categories.update', $category->id)}}" method="post" >
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
        </div>

        <div class="form-group">
            <button class="btn btn-primary">zapisz</button>
        </div>
    </form>

@endsection