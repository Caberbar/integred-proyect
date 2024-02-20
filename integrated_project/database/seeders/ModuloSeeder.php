<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\FormacionSeeder;

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
                'formacion' => 'DAW',
            ],
            [
                'horas' => 6,
                'denominacion' => 'Desarrollo Web en Entorno Servidor',
                'especialidad' => 'formación profesional',
                'siglas' => 'DWES',
                'curso' => 2,
                'formacion' => 'DAW',
            ],
            [
                'horas' => 3,
                'denominacion' => 'Despliegue de aplicaciones Web',
                'especialidad' => 'formación profesional',
                'siglas' => 'DAWEB',
                'curso' => 2,
                'formacion' => 'DAW',
            ],
            [
                'horas' => 7,
                'denominacion' => 'Diseño de Interfaces Web',
                'especialidad' => 'formación profesional',
                'siglas' => 'DIWEB',
                'curso' => 2,
                'formacion' => 'DAW',
            ],
            [
                'horas' => 4,
                'denominacion' => 'Empresa e Iniciativa Emprendedora',
                'especialidad' => 'formación profesional',
                'siglas' => 'EIE',
                'curso' => 2,
                'formacion' => 'DAW',
            ],
            [
                'horas' => 8,
                'denominacion' => 'Programación',
                'especialidad' => 'formación profesional',
                'siglas' => 'PRO',
                'curso' => 1,
                'formacion' => 'DAW',
            ],
            [
                'horas' => 6,
                'denominacion' => 'Bases de Datos',
                'especialidad' => 'formación profesional',
                'siglas' => 'BADAT',
                'curso' => 1,
                'formacion' => 'DAW',
            ],
            [
                'horas' => 3,
                'denominacion' => 'Entornos de Desarrollo',
                'especialidad' => 'formación profesional',
                'siglas' => 'ENDES',
                'curso' => 1,
                'formacion' => 'DAW',
            ],
            [
                'horas' => 6,
                'denominacion' => 'Sistemas Informáticos',
                'especialidad' => 'formación profesional',
                'siglas' => 'SIINF',
                'curso' => 1,
                'formacion' => 'DAW',
            ],
            [
                'horas' => 4,
                'denominacion' => 'Lenguaje de marcas y sistemas de gestión de información',
                'especialidad' => 'formación profesional',
                'siglas' => 'LMS',
                'curso' => 1,
                'formacion' => 'DAW',
            ],
            [
                'horas' => 4,
                'denominacion' => 'Formación y orientación laboral',
                'especialidad' => 'formación profesional',
                'siglas' => 'FOL',
                'curso' => 1,
                'formacion' => 'DAW',
            ]
        ];

        $formacionSeeder = new FormacionSeeder();
        $formaciones = $formacionSeeder->getFormaciones();

        foreach ($datos as $dato) {

            $formacion_id = null;

            foreach ($formaciones as $index => $formacion) {
                if ($formacion['siglas'] === $dato['formacion']) {
                    $formacion_id = $index + 1;
                    break;
                }
            }

            DB::table('modulos')->insert([
                'horas' => $dato['horas'],
                'denominacion' => $dato['denominacion'],
                'especialidad' => $dato['especialidad'],
                'siglas' => $dato['siglas'],
                'curso' => $dato['curso'],
                'formacion_id' => $formacion_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
