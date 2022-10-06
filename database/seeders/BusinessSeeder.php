<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
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
                'deskripsi'     => 'POSPAY LOKET',
                'pemilik'       => 'Divisi JASA KEUANGAN 1',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
            [
                'deskripsi'     => 'POSPAY MOBILE',
                'pemilik'       => 'Divisi JASA KEUANGAN 2',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
            [
                'deskripsi'     => 'POSPAY CANVASING',
                'pemilik'       => 'Divisi JASA KEUANGAN 3',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
            [
                'deskripsi'     => 'POSPAY MKIOS',
                'pemilik'       => 'Divisi JASA KEUANGAN 4',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
        ];

        Business::insert($list);

    }
}
