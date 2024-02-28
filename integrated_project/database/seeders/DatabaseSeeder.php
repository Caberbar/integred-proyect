<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProfesorSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FormacionSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(ModuloSeeder::class);
        $this->call(LeccionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserRoleSeeder::class);
    }
}
