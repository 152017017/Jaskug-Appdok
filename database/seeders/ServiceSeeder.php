<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
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
                'id' => 1,
                'id_grup' => 1,
                'deskripsi' => 'Pembayaran Premi Lanjutan Asuransi Mikro Rencana Alam'
            ],
        ];

        Service::insert($list);

    }
}
