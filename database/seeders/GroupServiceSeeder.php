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
                'bisnis_id' => 1,
                'deskripsi' => 'Asuransi',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'bisnis_id' => 1,
                'deskripsi' => 'Bank Channeling',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'bisnis_id' => 1,
                'deskripsi' => 'Deposit',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'bisnis_id' => 1,
                'deskripsi' => 'Gas',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
        ];

        GroupService::insert($list);

    }
}
