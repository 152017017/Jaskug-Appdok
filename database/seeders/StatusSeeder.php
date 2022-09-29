<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
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
                'deskripsi' => 'Tes Operasi'
            ],
            [
                'deskripsi' => 'Live baru'
            ],
            [
                'deskripsi' => 'Live perubahan'
            ],
            [
                'deskripsi' => 'Ditutup sementara'
            ],
            [
                'deskripsi' => 'Hapus'
            ],
        ];

        Status::insert($list);

    }
}
