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
                'id_bisnis' => 1,
                'deskripsi' => 'Asuransi'
            ],
            [
                'id_bisnis' => 1,
                'deskripsi' => 'Bank Channeling'
            ],
            [
                'id_bisnis' => 1,
                'deskripsi' => 'Deposit'
            ],
            [
                'id_bisnis' => 1,
                'deskripsi' => 'Gas'
            ],
        ];

        GroupService::insert($list);

    }
}
