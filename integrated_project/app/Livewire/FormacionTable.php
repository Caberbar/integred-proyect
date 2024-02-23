<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Formacion;
use Livewire\WithPagination;

class FormacionTable extends Component
{

    use WithPagination;

    public Formacion $formacion;
    public $accion = 'Crear';
    public $formacion_id,$siglas, $denominacion;
    public $error;

    /**
     * Es un hook de iniciación de la página web con todos los atributos a null, para evitar problemas de iniciación.
     */
    public function mount(){
        $this->formacion_id = null;
        $this->siglas = null;
        $this->denominacion = null;
        $this->formacion = new Formacion;
        $this->accion;
    }

    public $perPage = 10; /*Valor por defecto de numeros de usuarios en una tabla*/
    public $search = ''; /*Valor por defecto de la busqueda*/

    public  $sortDirection = 'ASC'; /*Valor por defecto de la dirección de la tabla*/
    public  $sortColumn = 'siglas'; /*Valor por defecto de la dirección de la tabla*/


    public function doSort($column){
        if($this->sortColumn === $column){
            $this->sortDirection =($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this -> sortDirection = 'ASC';
    }

    // Life cycle hooks
    public function updatedPerPage(){
        $this->resetPage();
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    /**
     * Renderizamos la página con todos los datos
     */
    public function render()
    {
        $formaciones = Formacion::search($this->search)
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->perPage);

        return view('livewire.formacion-table', compact('formaciones'));
    }


    public function modal($formacion_id = null){
        if($formacion_id != null){
            $this->accion = 'Update';
            $this->formacion = Formacion::findOrFail($formacion_id);
            $this->denominacion = $this->formacion->denominacion;
            $this->siglas = $this->formacion->siglas;
        }else{
            $this->accion = 'Create';
            $this->formacion->siglas = $this->siglas;
            $this->formacion->denominacion = $this->denominacion;
        }
    }


    public function save(){
        $this->validate($this->rules());
        $formacion = $this->formacion;
        $formacion->siglas = $this->siglas;
        $formacion->denominacion = $this->denominacion;

        $formacion->save();
        $this->mount();
        $this->dispatch('cerrar_modal');
    }


    /**
     * Buscamos la formación que el usuario desea eliminar
     * Relacion 1 a N con modulos -> sacamos todos los modulos de esa formación.
     *      Si esta es distina de null, recorremos modulo a modulo sacando sus lecciones por su relacion 1 a N,
     *      y eliminamos todas las lecciones, después borramos ese modulo y el foreach si tiene mas modulos realiza otra iteración.
     *
     * Relación 1 a N con grupos -> sacamos todso lso grupos que tienen esta formación.
     *       Recorremos todos los grupos que hay y los eliminamos uno a uno, después eliminamos el grupo y si hay mas el foreach,
     *       vuelve a realizar otra iteración.
     *
     * Por ulitmo borramos la formacion cuando todo esta eliminado, en caso de que no haya grupos o modulos esto no realizan ninguna
     * operación sobre la base de datos.
     */
    public function delete($formacion_id){
        $formacion = Formacion::find($formacion_id);
        $modulos = $formacion->modulos;

        if($modulos != null){
            foreach($modulos as $modulo){
                $lecciones = $modulo->lecciones;
                foreach($lecciones as $leccion){
                    $leccion->delete();
                }
                $modulo->delete();
            }
        }
        $grupos = $formacion->grupos;
        if($grupos != null){
            foreach($grupos as $grupo){
                $grupo->delete();
            }
        }
        $formacion->delete();
    }

    /**
     * Metodo de validación cuando el usuario hace UPDATE.
     *
     * Se llama con $this->validate(), porque queremos validar los atributos de este componente
     * que son los que el usuario modifica en el form.
     */
    public function rules(): array
    {
        return [
            'siglas'=>[
                'required',
            ],
            'denominacion'=>[
                'required',
                'max:255',
                'min:3'
            ],
        ];
    }
}
