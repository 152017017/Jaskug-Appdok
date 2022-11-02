<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'name'          => 'Admin',
                'email'         => 'admin@example.com',
                'password'      => Hash::make('password'),
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
            ],
            [
                'name'          => 'Pak Angga',  //operator-jaskug
                'email'         => 'angga@example.com',
                'password'      => Hash::make('password'),
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
            [
                'name'          => 'User Bisnis',    //user-bisnis
                'email'         => 'ubisnis@example.com',
                'password'      => Hash::make('password'),
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
        ];

        User::insert($list);

    }
}
