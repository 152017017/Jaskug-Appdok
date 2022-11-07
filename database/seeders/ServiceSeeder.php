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
                'nama'              => 'Pembayaran PDAM BS',
                'deskripsi'         => 'Pembayaran PDAM Kab. Bangka Selatan',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'gruplayanan_id'    => 1,
                'nama'              => 'Pembayaran PDAM BU',
                'deskripsi'         => 'Pembayaran PDAM Kab. Bangka Utara',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'gruplayanan_id'    => 2,
                'nama'              => 'Pembayaran Bank',
                'deskripsi'         => 'Pembayaran Bank Channeling',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'gruplayanan_id'    => 3,
                'nama'              => 'Pembayaran Pulsa',
                'deskripsi'         => 'Pembayaran Pulsa Telco',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'gruplayanan_id'    => 4,
                'nama'              => 'Pembayaran Tagihan Listrik',
                'deskripsi'         => 'Pembayaran Tagihan Listrik',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'gruplayanan_id'    => 4,
                'nama'              => 'Pembayaran Token Listrik',
                'deskripsi'         => 'Pembayaran Token Listrik',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
        ];

        Service::insert($list);

    }
}
