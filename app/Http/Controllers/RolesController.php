<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
{
    $roles = Role::paginate(10);

    return view('roles.index', [
        'roles' => $roles
    ]);
}

    public function create()
    {

        return view('roles.create');
    }

    public function store(Request $request)
    {


        $role = new Role();
        $role->name = $request->name;
        $role->save();

        return redirect(route('roles.index'));
    }

    public function edit(Role $role){

        // alternatywa wywietlenia wszystkich kategori  //$category = Category::find($id);

        return view('roles.edit',[
            'role' => $role
        ]);

    }


    public  function  update(Request $request, Role $role){
        $role->name = $request->name;
        $role->save();
        return redirect(route('roles.index') );
    }



    public function destroy(Role $role){
        $role->delete();
        return redirect(route('roles.index'));
    }
}
