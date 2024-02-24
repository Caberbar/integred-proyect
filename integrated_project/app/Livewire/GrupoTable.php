<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Grupo;
use App\Models\Formacion;
use App\Models\Leccion;
use Livewire\WithPagination;


class GrupoTable extends Component
{
    use WithPagination;

    public $accion = 'Crear';
    public Grupo $grupo;
    public $grupo_id, $denominacion, $turno, $curso_escolar, $curso, $formacion_id;


    /**
     * Es un hook de iniciación de la página web con todos los atributos a null, para evitar problemas de iniciación.
     */
    public function mount()
    {
        $this->grupo_id = null;
        $this->denominacion = null;
        $this->curso_escolar = null;
        $this->curso = null;
        $this->formacion_id = null;
        $this->turno = null;
        $this->grupo = new Grupo;
    }

    public $perPage = 10; /*Valor por defecto de numeros de usuarios en una tabla*/
    public $search = ''; /*Valor por defecto de la busqueda*/

    public  $sortDirection = 'ASC'; /*Valor por defecto de la dirección de la tabla*/
    public  $sortColumn = 'denominacion'; /*Valor por defecto de la dirección de la tabla*/

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
        $grupos = Grupo::search($this->search)
            ->when($this->sortColumn == 'formacion_denominacion', function ($query) {
                return $query->join('formacions', 'grupos.formacion_id', '=', 'formacions.id')
                    ->orderBy('formacions.denominacion', $this->sortDirection)
                    ->select('grupos.*', 'formacions.denominacion as formacion_denominacion'); // Cambia el nombre de la columna siglas de la tabla formaciones
            }, function ($query) {
                return $query->orderBy($this->sortColumn, $this->sortDirection);
            })
            ->paginate($this->perPage);

        $formaciones = Formacion::all();

        return view('livewire.grupo-table', compact('grupos', 'formaciones'));
    }


    public function modal($grupo_id = null){
        if($grupo_id != null){
            $this->accion = 'Editar';

            $this->grupo = Grupo::findOrFail($grupo_id);
            $this->denominacion = $this->grupo->denominacion;
            $this->curso_escolar = $this->grupo->curso_escolar;
            $this->curso = $this->grupo->curso;
            $this->formacion_id = $this->grupo->formacion_id;
            $this->turno = $this->grupo->turno;
        }else{
            $this->accion = 'Crear';
            $this->mount();
        }
    }

    public function save(){
        $this->validate();

        $grupo = $this->grupo;

        $grupo->denominacion = $this->denominacion;
        $grupo->curso_escolar = $this->curso_escolar;
        $grupo->curso = $this->curso;
        $grupo->formacion_id = $this->formacion_id;
        $grupo->turno = $this->turno;

        $grupo->save();

        $this->mount();

        $this->dispatch('cerrar_modal');
    }

    /**
     * Sacamos el objeto grupo en función del ID, una vez hecho eso por la relacion 1 a N
     * sacamos todas las lecciones que tiene ese grupo y si la variable lecciones es distinta de null
     * las recorremos una a una y las vamos borrando, una vez eliminado todo eliminamos el grupo.
     *
     */
    public function delete($grupo_id)
    {

        $grupo = Grupo::find($grupo_id);
        $lecciones = $grupo->lecciones;
        if ($lecciones != null) {
            foreach ($lecciones as $leccion) {
                $leccion->delete();
            }
        }
        $grupo->delete();
    }



    /**
     * Metodo de validación cuando el usuario hace UPDATE.
     *
     * Se llama con $this->validate(), porque queremos validar los atributos de este componente
     * que son los que el usuario modifica en el form.
     */
    protected $rules = [
        'denominacion' => [
            'required',
            'max:255',
            'min:3'
        ],
        'curso_escolar' => [
            'required',
            'regex:/^\d{4}\/\d{4}$/i',
        ],
        'curso' => [
            'required',
        ],
        'turno' => [
            'required',
            'regex:/^(Mañana|Tarde)$/i'
        ],
        'formacion_id' => [
            'required',
            'integer',
            'min:0'
        ],
    ];

}
