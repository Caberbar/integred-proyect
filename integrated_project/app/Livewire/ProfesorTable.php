<?php

namespace App\Livewire;
use App\Models\Profesor;
use Livewire\Component;
use Livewire\WithPagination;

class ProfesorTable extends Component
{

    use WithPagination;

    public $accion = 'Create';
    public Profesor $profesor;

    public $nombre, $apellido1, $apellido2, $especialidad, $usu_seneca;
    public $error;

    /**
     * Es un hook de iniciación de la página web con todos los atributos a null, para evitar problemas de iniciación.
     */
    public function mount(){
        $this->usu_seneca = null;
        $this->nombre = null;
        $this->apellido1 = null;
        $this->apellido2 = null;
        $this->especialidad = null;
        $this->profesor = new Profesor;
    }

    public $perPage = 10; /*Valor por defecto de numeros de usuarios en una tabla*/
    public $search = ''; /*Valor por defecto de la busqueda*/

    public  $sortDirection = 'ASC'; /*Valor por defecto de la dirección de la tabla*/
    public  $sortColumn = 'usu_seneca'; /*Valor por defecto de la dirección de la tabla*/


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
        // $teachers = Profesor::where('nombre', 'like', '%' . $this->search . '%')
        //     ->orWhere('apellido1', 'like', '%' . $this->search . '%')
        //     ->orWhere('apellido2', 'like', '%' . $this->search . '%')
        //     ->orWhere('usu_seneca', 'like', '%' . $this->search . '%')
        //     ->orWhere('especialidad', 'like', '%' . $this->search . '%')
        //     ->get();

        $teachers = Profesor::search($this->search)
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->perPage);

        return view('livewire.profesor-table', compact('teachers'));
    }

    public function modal($profesor_id = null){
        if($profesor_id != null){
            $this->accion = 'Edit';

            $this->profesor = Profesor::findOrFail($profesor_id);
            $this->usu_seneca = $this->profesor->usu_seneca;
            $this->nombre = $this->profesor->nombre;
            $this->apellido1 = $this->profesor->apellido1;
            $this->apellido2 = $this->profesor->apellido2;
            $this->especialidad = $this->profesor->especialidad;
        }else{
            $this->accion = 'Create';

            $profesor = $this->profesor;
            $profesor->usu_seneca = $this->usu_seneca;
            $profesor->nombre = $this->nombre;
            $profesor->apellido1 = $this->apellido1;
            $profesor->apellido2 = $this->apellido2;
            $profesor->especialidad = $this->especialidad;
        }
    }
    public function save(){
        $this->validate($this->rules());

        $profesor = $this->profesor;
        $profesor->usu_seneca = $this->usu_seneca;
        $profesor->nombre = $this->nombre;
        $profesor->apellido1 = $this->apellido1;
        $profesor->apellido2 = $this->apellido2;
        $profesor->especialidad = $this->especialidad;

        $profesor->save();
        $this->mount();
        $this->dispatch('cerrar_modal');
    }
    /**
     * Sacamos el objeto profesor en función del ID, una vez hecho eso por la relacion 1 a N
     * sacamos todas las lecciones que tiene ese grupo y si la variable lecciones es distinta de null
     * las recorremos una a una y las vamos borrando, una vez eliminado todo eliminamos el profesor.
     *
     */
    public function delete($profesor_id){
        $profesor = Profesor::findOrFail($profesor_id);
        $lecciones = $profesor->lecciones;
        if($lecciones != null){
            foreach($lecciones as $leccion){
                $leccion->delete();
            }
        }
        $profesor->delete();
    }


     /**
     * Metodo de validación cuando el usuario hace UPDATE.
     *
     * Se llama con $this->validate(), porque queremos validar los atributos de este componente
     * que son los que el usuario modifica en el form.
     */
    public function rules(){
        return [
            'usu_seneca'=>[
                'required',
            ],
            'nombre'=>[
                'required',
                'max:30',
                'min:3',
                'alpha:ascii',
            ],
            'apellido1' => [
                'required',
                'max:50',
                'min:3',
                'alpha:ascii',
            ],
            'apellido2'=>[
                'required',
                'max:50',
                'min:3',
                'alpha:ascii',
            ],
            'especialidad'=>[
                'required',
                'regex:/^(secundaria|formacion profesional)$/i',
            ],
        ];
    }
}
