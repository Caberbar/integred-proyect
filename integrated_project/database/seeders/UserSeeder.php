<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios_seneca = DB::table('profesors')->pluck('usu_seneca')->toArray();

        foreach ($usuarios_seneca as $usu_seneca) {
            DB::table('users')->insert([
                'name' => $usu_seneca,
                'email' => $usu_seneca.'@gmail.com',
                'password' => Hash::make($usu_seneca),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
