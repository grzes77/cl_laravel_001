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


    /**
     * @param UsersRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UsersRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return redirect( route('users.index') );
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('users.edit',
            ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UsersEditRequest|Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UsersEditRequest $request, User $user)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);


        $user->update($data);
        return redirect( route('users.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
