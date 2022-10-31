<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        // $roles = Role::get();
        // $users = User::has('roles')->get();
        // dd($users);

        return view('dashboard.user.main', [
            "list" => User::all(),
            // compact('roles', 'users')
        ]);
    }

    public function create()
    {
        $roles = Role::get();
        $user = User::get();

        return view('permissions.user.create', compact('roles', 'user'));
    }

    public function store(Request $request)
    {
        $user = User::where('id', ($request->id_user))->first();
        $user->assignRole($request->roles);

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        $users = User::get();

        return view('permissions.user.edit', compact('user', 'roles', 'users'));
    }

    public function update(Request $request)
    {
        $user = User::findorfail($request->id);
        $user->syncRoles($request->roles);

        return redirect()->route('user.index');
    }
}
