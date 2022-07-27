<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'name' => 'Área 01',
            'color' => '#F4D03F',
            'coords' => '-31.755093,-52.318972;-31.754569,-52.316883;-31.757889,-52.312665;-31.758892,-52.317225'
        ]);

        DB::table('areas')->insert([
            'name' => 'Área 02',
            'color' => '#E74C3C',
            'coords' => '-31.754566,-52.316662;-31.757861,-52.312325;-31.764267,-52.302252;-31.752914,-52.309233'
        ]);
    }
}
