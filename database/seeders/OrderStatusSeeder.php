<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_fields')->insert([
            'label' => 'CREATED',
            'type' => 1,
            'active' => 1,
        ]);

        DB::table('system_fields')->insert([
            'label' => 'PAYED',
            'type' => 1,
            'active' => 1,
        ]);

        DB::table('system_fields')->insert([
            'label' => 'REJECTED',
            'type' => 1,
            'active' => 1,
        ]);

    }
}
