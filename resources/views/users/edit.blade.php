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

    <form action="{{route('users.storeEdit')}}" method="post" >
        {{csrf_field()}}
        <div class="form-group">
            <input placeholder="podaj nazwe uzytkownika" type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <input placeholder="podaj maila" type="text" class="form-control" name="email" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <input placeholder="haslo " type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <input placeholder=" powtorz haslo " type="password" class="form-control" name="password2">
        </div>



        <div class="form-group">
            <button class="btn btn-primary">zapisz</button>
        </div>
    </form>

@endsection