<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            [
                'denominacion' => '2DAWB',
                'turno' => 'tarde',
                'curso_escolar' => '2023-2024',
                'curso' => 2,
                'formacion_id' => 1,
            ]
        ];

        // Insertar datos en la tabla nueva
        foreach ($datos as $dato) {
            DB::table('grupos')->insert([
                'denominacion' => $dato['denominacion'],
                'turno' => $dato['turno'],
                'curso_escolar' => $dato['curso_escolar'],
                'curso' => $dato['curso'],
                'formacion_id' => $dato['formacion_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
