<?php

namespace Database\Seeders;

use App\Models\GroupService;
use Illuminate\Database\Seeder;

class GroupServiceSeeder extends Seeder
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
                'bisnis_id'     => 1,
                'deskripsi'     => 'PDAM',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
            [
                'bisnis_id'     => 2,
                'deskripsi'     => 'Bank Channeling',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
            [
                'bisnis_id'     => 3,
                'deskripsi'     => 'Telco',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
            [
                'bisnis_id'     => 4,
                'deskripsi'     => 'PLN',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ],
        ];

        GroupService::insert($list);

    }
}
