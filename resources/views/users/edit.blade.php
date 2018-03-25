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



    <form action="{{route('users.update',$user->id)}}" method="post">
        {{csrf_field()}}

        <input type="hidden" name="_method" value="put">

        <div class="form-group">
            <input placeholder="podaj nazwe uzytkownika" type="text" class="form-control" name="name"
                   value="{{$user->name}}">
        </div>

        <div class="form-group">
            <input placeholder="podaj maila" type="text" class="form-control" name="email" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <input placeholder="haslo " type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <input placeholder=" powtorz haslo " type="password" class="form-control" name="password_confirmation">
        </div>

        <div class="form-group">

            @foreach($roles as $role)



                <label>
                    {{$role->name}}


                    @if(in_array($role->id , $selectedRoles))
                        <input checked type="checkbox" name="role_id[]" value="{{$role->id}}"/>
                    @else
                        <input type="checkbox" name="role_id[]" value="{{$role->id}}"/>

                    @endif
                </label>




            @endforeach
        </div>


        <div class="form-group">
            <button class="btn btn-primary">zapisz</button>
        </div>
    </form>



    @endsection