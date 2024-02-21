<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesorSeeder extends Seeder
{

    private $nombres = [
        'Juan', 'Pedro', 'Diego', 'Carlos', 'Luis',
        'Maria', 'Ana', 'Laura', 'Sofia', 'Lucia',
        'Jose', 'Miguel', 'Manuel', 'David', 'Javier',
        'Elena', 'Carmen', 'Isabel', 'Patricia', 'Raquel'
    ];
    
    private $apellidos = [
        'Gomez', 'Rodriguez', 'Fernandez', 'Lopez', 'Martinez',
        'Garcia', 'Sanchez', 'Perez', 'Gonzalez', 'Ruiz',
        'Vazquez', 'Diaz', 'Torres', 'Jimenez', 'Moreno',
        'Romero', 'Alvarez', 'Morales', 'Ortega', 'Navarro'
    ];
    
    private $especialidades = ['secundaria', 'formación profesional'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cantidad = intval($this->command->ask('¿Cuántos profesores deseas agregar?'));
        $cantidadProfesoresAgregados = 0;

        for ($i = 0; $i < $cantidad; $i++) {
            $nombreAleatorio = $this->nombres[array_rand($this->nombres)];
            $apellidoAleatorio1 = $this->apellidos[array_rand($this->apellidos)];
            $apellidoAleatorio2 = $this->apellidos[array_rand($this->apellidos)];
            $inicialesApellidos = substr($apellidoAleatorio1, 0, 3) . substr($apellidoAleatorio2, 0, 3);
            $numeroAleatorio = rand(100, 999);
            $usuSeneca = strtolower(substr($nombreAleatorio, 0, 1) . $inicialesApellidos . $numeroAleatorio);
            $especialidadAleatoria = $this->especialidades[array_rand($this->especialidades)];

            DB::table('profesors')->insert([
                'usu_seneca' => $usuSeneca,
                'nombre' => $nombreAleatorio,
                'apellido1' => $apellidoAleatorio1,
                'apellido2' => $apellidoAleatorio2,
                'especialidad' => $especialidadAleatoria,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $cantidadProfesoresAgregados++;
        }

        $this->command->info("Se agregó $cantidadProfesoresAgregados profesor". ($cantidadProfesoresAgregados == 1 ? '' : 'es') .".");
    }
}
