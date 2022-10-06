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
                'gruplayanan_id'    => 1,
                'nama'              => 'PDAM Kab. Bangka Selatan',
                'deskripsi'         => 'Pembayaran PDAM',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'gruplayanan_id'    => 2,
                'nama'              => 'Cash in Giropos',
                'deskripsi'         => 'Pembayaran Giro Cash',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'gruplayanan_id'    => 1,
                'nama'              => 'PDAM Kota Salatiga',
                'deskripsi'         => 'Pembayaran PDAM',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
        ];

        Service::insert($list);

    }
}
