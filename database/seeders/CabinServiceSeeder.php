<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CabinServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabin_service')->insert([
            'cabin_id' => 1,
            'service_id' => 1,
        ]);

        DB::table('cabin_service')->insert([
            'cabin_id' => 1,
            'service_id' => 2,
        ]);
    }
}
