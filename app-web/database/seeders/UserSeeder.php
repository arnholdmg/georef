<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Miguel Geiss Arnhold',
            'email' => 'miguel@rasys.net',
            'isAdmArea' => true,
            'isAdmGroup' => true,
            'isAdmPatient' => true,
            'isAdmUser' => true,
            'password' => Hash::make('senha123'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Barbara',
            'email' => ' bhlutz@gmail.com',
            'isAdmArea' => true,
            'isAdmGroup' => true,
            'isAdmPatient' => true,
            'isAdmUser' => true,
            'password' => Hash::make('bhlutz@gmail.com'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Maurício',
            'email' => 'mumana74@gmail.com',
            'isAdmArea' => true,
            'isAdmGroup' => true,
            'isAdmPatient' => true,
            'isAdmUser' => true,
            'password' => Hash::make('mumana74@gmail.com'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Ana',
            'email' => 'anarosses@gmail.com',
            'isAdmArea' => true,
            'isAdmGroup' => true,
            'isAdmPatient' => true,
            'isAdmUser' => true,
            'password' => Hash::make('anarosses@gmail.com'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Maria Aurora',
            'email' => 'machrestani@uol.com.br',
            'isAdmArea' => true,
            'isAdmGroup' => true,
            'isAdmPatient' => true,
            'isAdmUser' => true,
            'password' => Hash::make('machrestani@uol.com.br'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Silvia',
            'email' => 'silviaecmacedo@gmail.com',
            'isAdmArea' => true,
            'isAdmGroup' => true,
            'isAdmPatient' => true,
            'isAdmUser' => true,
            'password' => Hash::make('silviaecmacedo@gmail.com'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Teste 01',
            'email' => 'teste@teste.com',
            'isAdmArea' => true,
            'isAdmGroup' => true,
            'isAdmPatient' => true,
            'isAdmUser' => true,
            'password' => Hash::make('teste@teste.com'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Teste 02',
            'email' => 'teste2@teste.com',
            'isAdmArea' => false,
            'isAdmGroup' => false,
            'isAdmPatient' => false,
            'isAdmUser' => false,
            'password' => Hash::make('teste2@teste.com'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
