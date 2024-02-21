<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\FormacionSeeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $formacionSeeder = new FormacionSeeder();
        $formaciones = $formacionSeeder->getFormaciones();

        $registros = [];

        foreach ($formaciones as $index => $formacion) {
            $formacion_id = $index + 1;

            $denominacion1 = '1' . $formacion['siglas'] . 'A';
            $denominacion2 = '2' . $formacion['siglas'] . 'B';
            $denominacion3 = '1' . $formacion['siglas'] . 'B';
            $denominacion4 = '2' . $formacion['siglas'] . 'A';

            $turno1 = 'mañana';
            $turno2 = 'tarde';
            $curso1 = 1;
            $curso2 = 2;

            $registros[] = [
                'denominacion' => $denominacion1,
                'turno' => $turno1,
                'curso_escolar' => '2023-2024',
                'curso' => $curso1,
                'formacion_id' => $formacion_id,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $registros[] = [
                'denominacion' => $denominacion2,
                'turno' => $turno2,
                'curso_escolar' => '2023-2024',
                'curso' => $curso2,
                'formacion_id' => $formacion_id,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $registros[] = [
                'denominacion' => $denominacion3,
                'turno' => $turno2,
                'curso_escolar' => '2023-2024',
                'curso' => $curso1,
                'formacion_id' => $formacion_id,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $registros[] = [
                'denominacion' => $denominacion4,
                'turno' => $turno2,
                'curso_escolar' => '2023-2024',
                'curso' => $curso2,
                'formacion_id' => $formacion_id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('grupos')->insert($registros);
    }
}
