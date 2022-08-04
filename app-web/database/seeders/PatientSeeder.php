<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'name' => 'Eustácio Silva',
            'birth' => '1935-08-01',
            'cns' => '111111111111111',
            'phone' => '53999999999',
            'responsible' => 'Maria Silva',
            'relationship' => 'Filha',
            'address' => 'Rua Guararapes 01, Areal - Pelotas',
            'coord' => '-31.755837,-52.317246',
            'area_id' => '1',
            'group_id' => '1'
        ]);

        DB::table('patients')->insert([
            'name' => 'Maria Silva',
            'birth' => '1985-01-01',
            'cns' => '111111111111112',
            'phone' => '53999999999',
            'address' => 'Rua Guararapes 01, Areal - Pelotas',
            'coord' => '-31.755837,-52.317246',
            'area_id' => '1',
            'group_id' => '2'
        ]);

        DB::table('patients')->insert([
            'name' => 'João Madeira',
            'birth' => '1995-02-01',
            'cns' => '111111111111113',
            'phone' => '53999999997',
            'address' => 'Praça da Liberdade, Areal - Pelotas',
            'coord' => '-31.756594,-52.316302',
            'area_id' => '1',
            'group_id' => '1'
        ]);

        DB::table('patients')->insert([
            'name' => 'Enzo Santos Terceiro',
            'birth' => '2022-08-01',
            'cns' => '111111111111119',
            'phone' => '53999999990',
            'responsible' => 'Sávio Santos',
            'relationship' => 'Pai',
            'address' => 'Rua Justino Sereno Ribeiro 01, Areal - Pelotas',
            'coord' => '-31.758683,-52.307725',
            'area_id' => '6',
            'group_id' => '3'
        ]);
    }
}
