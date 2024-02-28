<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin'], /* ROLE ID 1*/
            ['name' => 'Teacher'], /* ROLE ID 2*/
            ['name' => 'Guest'], /* ROLE ID 3*/
        ];

        DB::table('roles')->insert($roles);
    }
}
