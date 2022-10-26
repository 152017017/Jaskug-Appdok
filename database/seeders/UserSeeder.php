<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'updated_at'    => date('Y-m-d h:i:s')
            ],
            [
                'name'          => 'Jurgen Klopp',  //operator-jaskug
                'email'         => 'klopp@example.com',
                'password'      => Hash::make('password'),
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
            [
                'name'          => 'Sadio Mane',    //user-bisnis
                'email'         => 'sadio@example.com',
                'password'      => Hash::make('password'),
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
        ];

        User::insert($list);

    }
}
