<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CabinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabins')->insert([
            'name' => 'Cabaña 1',
            'cabinlevels_id' => 1,
            'services_id' => 1,
            'capacity' => 4
        ]);

        DB::table('cabins')->insert([
            'name' => 'Cabaña 2',
            'cabinlevels_id' => 2,
            'services_id' => 2,
            'capacity' => 6
        ]);

        DB::table('cabins')->insert([
            'name' => 'Cabaña 3',
            'cabinlevels_id' => 1,
            'services_id' => 2,
            'capacity' => 8
        ]);

        DB::table('cabins')->insert([
            'name' => 'Cabaña 4',
            'cabinlevels_id' => 2,
            'services_id' => 1,
            'capacity' => 10
        ]);
    }
}
