<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = DB::table('users')->pluck('id'); /* Pluck is used to get a list of values from a column. */
        $roles = DB::table('roles')->pluck('id');

        foreach ($users as $userId) {
            // Asigna un rol aleatorio a cada usuario
            $roleId = $roles->random();
            DB::table('role_user')->insert([
                'user_id' => $userId,
                'role_id' => $roleId,
            ]);
        }
    }
}
