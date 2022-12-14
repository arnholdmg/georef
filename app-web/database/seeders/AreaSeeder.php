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
            'id' => 1,
            'name' => 'Área 01',
            'color' => '#757780',
            'coords' => '-31.755026,-52.319162;-31.754506,-52.316866;-31.755889,-52.314780;-31.756783,-52.315433;-31.758238,-52.313738;-31.759045,-52.317209'
        ]);

        DB::table('areas')->insert([
            'id' => 2,
            'name' => 'Área 02',
            'color' => '#D2CCA1',
            'coords' => '-31.754506,-52.316866;-31.753810,-52.314133;-31.757493,-52.309211;-31.758238,-52.313738;-31.756783,-52.315433;-31.755889,-52.314780'
        ]);

        DB::table('areas')->insert([
            'id' => 3,
            'name' => 'Área 03',
            'color' => '#387780',
            'coords' => '-31.753810,-52.314133;-31.753289,-52.312103;-31.757321,-52.307895;-31.757493,-52.309211'
        ]);

        DB::table('areas')->insert([
            'id' => 4,
            'name' => 'Área 04',
            'color' => '#2F3061',
            'coords' => '-31.753289,-52.312103;-31.752800,-52.309444;-31.754889,-52.307407;-31.754085,-52.305897;-31.755110,-52.304805;-31.756124,-52.303818;-31.757321,-52.307895'
        ]);

        DB::table('areas')->insert([
            'id' => 5,
            'name' => 'Área 05',
            'color' => '#E83151',
            'coords' => '-31.752800,-52.309444;-31.752012,-52.304839;-31.754215,-52.302485;-31.755110,-52.304805;-31.754085,-52.305897;-31.754889,-52.307407'
        ]);

        DB::table('areas')->insert([
            'id' => 6,
            'name' => 'Área 06',
            'color' => '#562C2C',
            'coords' => '-31.759045,-52.317209;-31.758238,-52.313738;-31.757493,-52.309211;-31.757321,-52.307895;-31.756124,-52.303818;-31.754747,-52.300973;-31.772110,-52.300268;-31.774498,-52.309246'
        ]);
    }
}
