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
                'id_grup' => 1,
                'deskripsi' => 'POSPAY LOKET',
                'pemilik' => 'Divisi JASA KEUANGAN 1',
            ],
        ];

        Business::insert($list);

    }
}
