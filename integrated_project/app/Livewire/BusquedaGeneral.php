<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Profesor;
use App\Models\Modulo;
use App\Models\Grupo;

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

            $modulos = Modulo::where('curso', 'like', "%$this->searchG%")
                ->orWhere('denominacion', 'like', "%$this->searchG%")
                ->orWhere('siglas', 'like', "%$this->searchG%")
                ->get();

            $grupos = Grupo::where('denominacion', 'like', "%$this->searchG%")
                ->orWhere('curso_escolar', 'like', "%$this->searchG%")
                ->orWhere('curso', 'like', "%$this->searchG%")
                ->orWhere('turno', 'like', "%$this->searchG%")
                ->get();

            $searchResults = compact('profesores', 'modulos', 'grupos');
        }

        return view('livewire.busqueda-general', [
            'searchResults' => $searchResults
        ]);
            
    }
}
