<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        $permission = new Permission;
        return view('permissions.permissions.index', compact('permissions', 'permission'));
    }

    public function create()
    {
        return view('permissions.permissions.create');
    }

    public function store(Request $request)
    {
        Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);
        return redirect()->route('permissions.index');
    }

    public function edit($id)
    {
        $permissions = Permission::findOrFail($id);

        return view('permissions.permissions.edit', compact('permissions'));
    }

    public function update(Request $request)
    {
        $permissions = Permission::findOrFail($request->id);
        $permissions->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);

        return redirect()->route('permissions.index');
    }

    public function delete($id)
    {
        Permission::where('id', $id)->delete();

        return redirect()->route('permissions.index');
    }
}
