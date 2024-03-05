<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Profesor;
use App\Models\Modulo;
use App\Models\Grupo;
use App\Models\Formacion;
use App\Models\Leccion;

class BusquedaGeneral extends Component
{
    public $searchG;

    public function render()
    {
        $searchResults = [];

        if (!empty($this->searchG)) {
            $terminoBusqueda = $this->searchG;
            $nombres = explode(" ", $terminoBusqueda);
            $numPalabras = count($nombres);

            $profesores = Profesor::where(function($query) use ($terminoBusqueda, $nombres, $numPalabras) {
                if ($numPalabras === 1) {
                    $query->where('nombre', 'like', "%$terminoBusqueda%")
                        ->orWhere('apellido1', 'like', "%$terminoBusqueda%")
                        ->orWhere('apellido2', 'like', "%$terminoBusqueda%");
                } elseif ($numPalabras === 2) {
                    $query->where(function($query) use ($nombres) {
                        $query->where('nombre', 'like', "%$nombres[0]%")
                            ->where('apellido1', 'like', "%$nombres[1]%")
                            ->orWhere('apellido1', 'like', "%$nombres[0]%")
                            ->where('apellido2', 'like', "%$nombres[1]%");
                    })->orWhere(function($query) use ($nombres) {
                        $query->where('apellido1', 'like', "%$nombres[0]%")
                            ->where('apellido2', 'like', "%$nombres[1]%")
                            ->orWhere('nombre', 'like', "%$nombres[0]%")
                            ->where('apellido1', 'like', "%$nombres[1]%");
                    });
                } elseif ($numPalabras === 3) {
                    $query->where('nombre', 'like', "%$nombres[0]%")
                        ->where('apellido1', 'like', "%$nombres[1]%")
                        ->where('apellido2', 'like', "%$nombres[2]%");
                }
            })
            ->orWhere('especialidad', 'like', "%$terminoBusqueda%")
            ->get();

            $formaciones = Formacion::where('siglas', 'like', "%$this->searchG%")
                ->orWhere('denominacion', 'like', "%$this->searchG%")
                ->get();

            $modulos = Modulo::where('curso', 'like', "%$this->searchG%")
                ->orWhere('denominacion', 'like', "%$this->searchG%")
                ->orWhere('siglas', 'like', "%$this->searchG%")
                ->get();

            $grupos = Grupo::where('denominacion', 'like', "%$this->searchG%")
                ->orWhere('curso_escolar', 'like', "%$this->searchG%")
                ->orWhere('curso', 'like', "%$this->searchG%")
                ->orWhere('turno', 'like', "%$this->searchG%")
                ->get();

            $lecciones = Leccion::where('horas', 'like', "%$this->searchG%")
                ->orWhereHas('profesor', function ($query) use ($terminoBusqueda, $nombres, $numPalabras) {
                    $query->where(function($query) use ($terminoBusqueda, $nombres, $numPalabras) {
                        if ($numPalabras === 1) {
                            $query->where('nombre', 'like', "%$terminoBusqueda%")
                                ->orWhere('apellido1', 'like', "%$terminoBusqueda%")
                                ->orWhere('apellido2', 'like', "%$terminoBusqueda%");
                        } elseif ($numPalabras === 2) {
                            $query->where(function($query) use ($nombres) {
                                $query->where('nombre', 'like', "%$nombres[0]%")
                                    ->where('apellido1', 'like', "%$nombres[1]%")
                                    ->orWhere('apellido1', 'like', "%$nombres[0]%")
                                    ->where('apellido2', 'like', "%$nombres[1]%");
                            })->orWhere(function($query) use ($nombres) {
                                $query->where('apellido1', 'like', "%$nombres[0]%")
                                    ->where('apellido2', 'like', "%$nombres[1]%")
                                    ->orWhere('nombre', 'like', "%$nombres[0]%")
                                    ->where('apellido1', 'like', "%$nombres[1]%");
                            });
                        } elseif ($numPalabras === 3) {
                            $query->where('nombre', 'like', "%$nombres[0]%")
                                ->where('apellido1', 'like', "%$nombres[1]%")
                                ->where('apellido2', 'like', "%$nombres[2]%");
                        }
                    });
                })
                ->orWhereHas('modulo', function ($query) {
                    $query->where('denominacion', 'like', "%$this->searchG%")
                    ->orWhere('siglas', 'like', "%$this->searchG%");
                })
                ->orWhereHas('grupo', function ($query) {
                    $query->where('denominacion', 'like', "%$this->searchG%");
                })
                ->orWhere('profesor_id', 'like', "%$this->searchG%")
                ->orWhere('modulo_id', 'like', "%$this->searchG%")
                ->orWhere('grupo_id', 'like', "%$this->searchG%")
                ->with('profesor')
                ->with('modulo')
                ->get();    
            
            $searchResults = compact('profesores', 'formaciones', 'modulos', 'grupos', 'lecciones');
        }

        return view('livewire.busqueda-general', [
            'searchResults' => $searchResults
        ]);
            
    }
}
