<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{


    public function index()
    {
        $users = User::all();

        return view('users.index',[
            'users' => $users
        ]);
    }


    public function create()
    {
        return view('users.create');
    }



    public function store(UsersRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return redirect( route('users.index') );
    }




    public function show($id)
    {
        //
    }




    public function edit(User $user)
    {

        return view('users.edit',
            ['user' => $user]);
    }



    public function update(UsersEditRequest $request, User $user)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);


        $user->update($data);
        return redirect( route('users.index') );
    }



    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'));
    }
}
