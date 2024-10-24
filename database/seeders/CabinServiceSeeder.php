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
        DB::table('cabin_services')->insert([
            'cabins_id' => 1,
            'services_id' => 1,
        ]);

        DB::table('cabin_services')->insert([
            'cabins_id' => 1,
            'services_id' => 2,
        ]);
    }
}
