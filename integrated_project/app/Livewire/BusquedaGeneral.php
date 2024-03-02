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
            $profesores = Profesor::where('nombre', 'like', "%$this->searchG%")
                ->orWhere('apellido1', 'like', "%$this->searchG%")
                ->orWhere('apellido2', 'like', "%$this->searchG%")
                ->orWhere('especialidad', 'like', "%$this->searchG%")
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
                ->orWhereHas('profesor', function ($query) {
                    $query->where('nombre', 'like', "%$this->searchG%")
                    ->orWhere('apellido1', 'like', "%$this->searchG%")
                    ->orWhere('apellido2', 'like', "%$this->searchG%");
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
