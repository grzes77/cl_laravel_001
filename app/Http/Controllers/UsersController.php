<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Role;
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

        $roles= Role::all();

        return view('users.create',
            [
             'roles' => $roles

            ]);
    }



    public function store(UsersRequest $request)
    {



        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->roles()->attach($request->get('role_id'));

        return redirect( route('users.index') );
    }




    public function show($id)
    {
        //
    }




    public function edit(User $user)
    {
        $roles = Role::all();


        return view('users.edit',
            ['user' => $user,
              'roles' => $roles,
                'selectedRoles' => $user->roles()->pluck('id')->toArray()

                ]);
    }



    public function update(UsersEditRequest $request, User $user)
    {


        $data = $request->all();
        $data['password'] = bcrypt($data['password']);


        $user->update($data);
        $user->roles()->sync($request->get('role_id'));

        return redirect( route('users.index') );
    }



    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'));
    }
}
