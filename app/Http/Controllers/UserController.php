<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $users = User::has('roles')->get();

        return view('dashboard.user.main', compact('roles', 'users'));
    }

    public function create()
    {
        return view('dashboard.user.create', [
            "roles" => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        // @dd($request);

        // $validatedData = $request->validate([
        //     "nama" => 'required|max:255|alpha',
        //     "email" => 'required|email|unique:users',
        //     "password" => 'required|min:5|max:255',
        // ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);
        
        // User::create($validatedData);

        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect('/dashboard/user')->with('success', 'New user has been added !');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        $users = User::get();

        return view('dashboard.user.edit', compact('user', 'roles', 'users'));
    }

    public function update(Request $request)
    {
        $user = User::findorfail($request->id);
        $user->syncRoles($request->roles);

        return redirect('/dashboard/user/')->with('success', 'Item has been updated !');
    }
}
