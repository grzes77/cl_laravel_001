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


    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>image</th>

             </tr>


            <tr>
                <td>{{$file->id}}</td>


                <td>

                    <img with="200" src="/storage/thumb/{{$file->file_name}}"/>
                </td>


            </tr>

    </table>


    <form enctype="multipart/form-data" action="{{route('files.update', $file->id ) }}" method="post" >
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">


        <div class="form-group">

            <input  type="file" class="form-control" name="file_name" >
        </div>

        <div class="form-group">
            <button class="btn btn-primary">edytuj</button>
        </div>
    </form>



@endsection