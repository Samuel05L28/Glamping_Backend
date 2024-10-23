<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            'name' => "Limpieza",
            'description' => "Limpieza de la cabaña. ",
        ]);

        DB::table('services')->insert([
            'name' => "Desayuno",
            'description' => "Desayuno en la cabaña. ",
        ]);
    }
}
