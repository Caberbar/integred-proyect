<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            [
                'horas' => 6,
                'denominacion' => 'Desarrollo Web en Entorno Cliente',
                'especialidad' => 'formación profesional',
                'siglas' => 'DWEC',
                'curso' => 2,
                'formacion_id' => 1,
            ]
        ];

        foreach ($datos as $dato) {
            DB::table('modulos')->insert([
                'horas' => $dato['horas'],
                'denominacion' => $dato['denominacion'],
                'especialidad' => $dato['especialidad'],
                'siglas' => $dato['siglas'],
                'curso' => $dato['curso'],
                'formacion_id' => $dato['formacion_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
