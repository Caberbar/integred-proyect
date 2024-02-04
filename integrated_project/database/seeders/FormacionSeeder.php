<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formaciones = [
            [
                'denominacion' => 'Desarrollo de Aplicaciones Web',
                'siglas' => 'DAW',
            ],
            [
                'denominacion' => 'Curso Especialización de Ciberseguridad',
                'siglas' => 'CIBER',
            ],
        ];

        // Insertar datos en la tabla de formación
        foreach ($formaciones as $formacion) {
            DB::table('formacions')->insert([
                'siglas' => $formacion['siglas'],
                'denominacion' => $formacion['denominacion'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
