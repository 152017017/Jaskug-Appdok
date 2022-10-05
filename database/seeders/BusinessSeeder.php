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
        ];

        Business::insert($list);

    }
}
