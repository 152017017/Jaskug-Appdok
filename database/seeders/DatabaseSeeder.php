<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Business;
use App\Models\GroupService;
use App\Models\Platform;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::create([
            'name' => 'Josua Sirait',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);

        Business::create([
            'id' => '01',
            'deskripsi' => 'POSPAY LOKET',
            'pemilik' => 'Divisi JASA KEUANGAN 1'
        ]);

        Platform::create([
            'id' => '01',
            'deskripsi' => 'Aplikasi Loket'
        ]);

        GroupService::create([
            'id' => '01',
            'deskripsi' => 'asuransi'
        ]);
    }
}
