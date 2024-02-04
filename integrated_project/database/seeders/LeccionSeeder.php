<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lecciones = [
            [
                'horas' => 30,
                'profesor_id' => 1,
                'modulo_id' => 1,
                'grupo_id' => 1,   
            ]
        ];

        // Insertar datos en la tabla lección
        foreach ($lecciones as $leccion) {
            DB::table('leccions')->insert([
                'horas' => $leccion['horas'],
                'profesor_id' => $leccion['profesor_id'],
                'modulo_id' => $leccion['modulo_id'],
                'grupo_id' => $leccion['grupo_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
