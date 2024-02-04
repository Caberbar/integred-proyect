<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesores = [
            [
                'usu_seneca' => 'jgarlop452',
                'nombre' => 'Juan',
                'apellido1' => 'García',
                'apellido2' => 'López',
                'especialidad' => 'secundaria',
            ],
            [
                'usu_seneca' => 'pmarpoz854',
                'nombre' => 'Pablo',
                'apellido1' => 'Martínez',
                'apellido2' => 'Pozo',
                'especialidad' => 'formación profesional',
            ],
        ];

        foreach ($profesores as $profesor) {
            DB::table('profesors')->insert([
                'usu_seneca' => $profesor['usu_seneca'],
                'nombre' => $profesor['nombre'],
                'apellido1' => $profesor['apellido1'],
                'apellido2' => $profesor['apellido2'],
                'especialidad' => $profesor['especialidad'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
