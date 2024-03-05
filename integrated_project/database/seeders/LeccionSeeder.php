<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Formacion;
use App\Models\Grupo;
use App\Models\Leccion;
use App\Models\Modulo;
use App\Models\Profesor;

class LeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulos = Modulo::all();

        foreach ($modulos as $modulo) {
            $profesor = Profesor::inRandomOrder()->first();
            $formacion = Formacion::find($modulo->formacion_id);

            $grupo = Grupo::where('denominacion', 'like', "%$formacion->siglas%")
                        ->where('curso', $modulo->curso)
                        ->inRandomOrder()
                        ->first();

            if ($grupo) {
                DB::table('leccions')->insert([
                    'horas' => $modulo->horas,
                    'profesor_id' => $profesor->id,
                    'modulo_id' => $modulo->id,
                    'grupo_id' => $grupo->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
