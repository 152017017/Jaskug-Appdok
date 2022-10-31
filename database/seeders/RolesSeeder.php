<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permission
        Permission::create(['name' => 'create task']);
        Permission::create(['name' => 'show task']);
        Permission::create(['name' => 'edit task']);
        Permission::create(['name' => 'delete task']);

        // Roles Admin
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
        
        // Roles Operator
        $role = Role::create(['name' => 'operator']);
        $role->givePermissionTo(['edit task']);

        // Roles User Bisnis
        $role = Role::create(['name' => 'user-bisnis']);
        $role->givePermissionTo(['create task', 'edit task']);

        // Assigning Roles and Permission
        $admin = User::find(1);
        $admin->assignRole('admin');

        $operator = User::find(2);
        $operator->assignRole('operator');

        $user_bisnis = User::find(3);
        $user_bisnis->assignRole('user-bisnis');
        
    }
}
