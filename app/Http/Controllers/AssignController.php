<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Permission, Role};

class AssignController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::get();

        return view('permissions.assign.index', compact('roles', 'permissions'));
    }

    public function create()
    {
        $roles = Role::get();
        $permissions = Permission::get();

        return view('permissions.assign.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::findorfail($request->id);
        $role->givePermissionTo($request->permissions);

        return redirect()->route('assign.index')->with('success', "Permission has been assigned to the role");
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $roles = Role::get();
        $permissions = Permission::get();

        return view('permissions.assign.edit', compact('roles', 'permissions', 'role'));
    }

    public function update(Request $request)
    {
        $role = Role::findorfail($request->id);
        $role->syncPermissions($request->permissions);

        return redirect()->route('assign.index')->with('success', 'The Permissions has been synced.');
    }
}
