<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Profesor;
use App\Models\Leccion;
use App\Models\Grupo;
use App\Models\Modulo;
use Livewire\WithPagination;


class LeccionTable extends Component
{

    use WithPagination;

    public Leccion $leccion;
    public $accion = 'Crear';
    public $horas, $leccion_id, $grupo_id, $modulo_id, $profesor_id;

    /**
     * Es un hook de iniciación de la página web con todos los atributos a null, para evitar problemas de iniciación.
     */
    public function mount()
    {
        $this->horas = null;
        $this->grupo_id = null;
        $this->modulo_id = null;
        $this->profesor_id = null;
        $this->leccion = new Leccion;
    }

    public $perPage = 10; /*Valor por defecto de numeros de usuarios en una tabla*/
    public $search = ''; /*Valor por defecto de la busqueda*/

    public  $sortDirection = 'ASC'; /*Valor por defecto de la dirección de la tabla*/
    public  $sortColumn = 'horas'; /*Valor por defecto de la dirección de la tabla*/


    public function doSort($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }

    // Life cycle hooks
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    /**
     * Renderizamos la página con todos los datos
     */
    public function render()
    {
        $lecciones = Leccion::search($this->search)
            ->when($this->sortColumn == 'profesor_nombre', function ($query) {
                return $query->join('profesors', 'leccions.profesor_id', '=', 'profesors.id')
                    ->orderBy('profesors.nombre', $this->sortDirection)
                    ->select('leccions.*', 'profesors.nombre as profesor_nombre');
            })
            ->when($this->sortColumn == 'modulo_nombre', function ($query) {
                return $query->join('modulos', 'leccions.modulo_id', '=', 'modulos.id')
                    ->orderBy('modulos.denominacion', $this->sortDirection)
                    ->select('leccions.*', 'modulos.denominacion as modulo_nombre');
            })
            ->when($this->sortColumn == 'grupo_nombre', function ($query) {
                return $query->join('grupos', 'leccions.grupo_id', '=', 'grupos.id')
                    ->orderBy('grupos.denominacion', $this->sortDirection)
                    ->select('leccions.*', 'grupos.denominacion as grupo_nombre');
            })
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);

        $profesores = Profesor::all();
        $modulos = Modulo::all();
        $grupos = Grupo::all();

        return view('livewire.leccion-table', compact('lecciones', 'profesores', 'modulos', 'grupos'));
    }

    public function modal($leccion_id = null){
        if($leccion_id != null){
            $this->accion = 'Edit';
            $this->leccion = Leccion::findOrFail($leccion_id);
            $this->horas = $this->leccion->horas;
            $this->grupo_id = $this->leccion->grupo_id;
            $this->modulo_id = $this->leccion->modulo_id;
            $this->profesor_id = $this->leccion->profesor_id;
        }else{
            $this->accion = 'Create';
            $this->mount();
        }
    }
    public function save(){
        $this->validate();

        $leccion = $this->leccion;
        $leccion->horas = $this->horas;
        $leccion->grupo_id = $this->grupo_id;
        $leccion->modulo_id = $this->modulo_id;
        $leccion->profesor_id = $this->profesor_id;

        $leccion->save();
        $this->mount();
        $this->dispatch('cerrar_modal');
    }
    /**
     * Buscamos la lección en función de su id, y la eliminamos.
     */
    public function delete($leccion_id)
    {
        Leccion::find($leccion_id)->delete();
    }


    /**
     * Metodo de validación cuando el usuario hace UPDATE.
     *
     * Se llama con $this->validate(), porque queremos validar los atributos de este componente
     * que son los que el usuario modifica en el form.
     */
    protected $rules = [
        'horas' => [
            'required',
            'integer',
            'min:1',
        ],
        'modulo_id' => [
            'required',
            'integer',
            'min:0'
        ],
        'profesor_id' => [
            'required',
            'integer',
            'min:0'
        ],
        'grupo_id' => [
            'required',
            'integer',
            'min:0'
        ],
    ];

}
