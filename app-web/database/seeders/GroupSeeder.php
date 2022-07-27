<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'Acamados',
            'color' => '#58D68D'
        ]);

        DB::table('groups')->insert([
            'name' => 'Gestantes',
            'color' => '#FF0084'
        ]);

        DB::table('groups')->insert([
            'name' => 'Recém Nascidos',
            'color' => '#3498DB'
        ]);
    }
}
