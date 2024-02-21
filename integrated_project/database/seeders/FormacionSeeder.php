<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormacionSeeder extends Seeder
{

    public $formaciones = [
        [
            'denominacion' => 'Desarrollo de Aplicaciones Web',
            'siglas' => 'DAW',
        ],
        [
            'denominacion' => 'Curso Especialización de Ciberseguridad',
            'siglas' => 'CIBER',
        ],
        [
            'denominacion' => 'Administración y Finanzas',
            'siglas' => 'AyF',
        ],
        [
            'denominacion' => 'Comercio Internacional',
            'siglas' => 'CI',
        ],
        [
            'denominacion' => 'Administración de Sistemas Informáticos en Red',
            'siglas' => 'ASIR',
        ],
        [
            'denominacion' => 'Desarrollo de Aplicaciones Multiplataforma',
            'siglas' => 'DAM',
        ],
        [
            'denominacion' => 'Inteligencia Artificial y Big Data',
            'siglas' => 'IA',
        ],
        [
            'denominacion' => 'Implementación de Redes 5g',
            'siglas' => 'REDES',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formaciones = $this->getFormaciones();
        foreach ($formaciones as $formacion) {
            DB::table('formacions')->insert([
                'siglas' => $formacion['siglas'],
                'denominacion' => $formacion['denominacion'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function getFormaciones()
    {
        return $this->formaciones;
    }
}
