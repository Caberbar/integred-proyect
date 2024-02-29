<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Modulo;
use App\Models\Formacion;
use Livewire\WithPagination;


class ModuloTable extends Component
{
    use WithPagination;

    public $modulo_id, $curso, $formacion_id, $denominacion, $siglas, $horas, $especialidad;

    public Modulo $modulo;
    public $accion = 'Crear';

    public $perPage = 10; /*Valor por defecto de numeros de usuarios en una tabla*/
    public $search = ''; /*Valor por defecto de la busqueda*/

    public  $sortDirection = 'ASC'; /*Valor por defecto de la dirección de la tabla*/
    public  $sortColumn = 'denominacion'; /*Valor por defecto de la dirección de la tabla*/

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
    $modulos = Modulo::search($this->search)
    ->when($this->sortColumn == 'formacion_siglas', function ($query) {
        return $query->join('formacions', 'modulos.formacion_id', '=', 'formacions.id')
            ->orderBy('formacions.siglas', $this->sortDirection)
            ->select('modulos.*', 'formacions.siglas as formacion_siglas'); // Cambia el nombre de la columna siglas de la tabla formaciones
    }, function ($query) {
        return $query->orderBy($this->sortColumn, $this->sortDirection);
    })
    ->paginate($this->perPage);

    $formaciones = Formacion::all();

    return view('livewire.modulo-table', compact('modulos', 'formaciones'));
}
     /**
     * Es un hook de iniciación de la página web con todos los atributos a null, para evitar problemas de iniciación.
     */
    public function mount(){
        $this->modulo_id = null;
        $this->curso = null;
        $this->formacion_id = null;
        $this->denominacion = null;
        $this->siglas = null;
        $this->horas = null;
        $this->especialidad = null;
        $this->modulo = new Modulo;
    }

    /**
     * Una función que realiza dos trabajos en uno, depende de que boton pulse en la vista viene con una variable o no,
     * en el caso de que no venga con esta se le inicializa a null.
     *
     * Si esta es null, quiere decir que se va a crear un nuevo registro, en caso de que sea distinto a null es que se va a
     * editar un registro, por lo tanto inicializamos todas nuestras variables con los datos de la BD.
     */
    public function modal($modulo_id = null){
        if($modulo_id != null){
            $this->accion = 'Edit';
            $this->modulo = Modulo::findOrFail($modulo_id);
            $this->denominacion = $this->modulo->denominacion;
            $this->siglas = $this->modulo->siglas;
            $this->horas = $this->modulo->horas;
            $this->curso = $this->modulo->curso;
            $this->especialidad = $this->modulo->especialidad;
            $this->formacion_id = $this->modulo->formacion_id;
        }else{
            $this->accion = 'Create';
            $this->mount();
        }
    }

    /**
     * Validamos todos los datos que introdujo el usuario por teclado y creamos el nuevo registro, en caso de editar
     * los datos antiguos se conservan en el mismo estado y solo se actualizan los nuevos.
     *
     * Resetamos todas las variables con el hook de renderizado de la web y cerramos la ventana con un scrip.
     */
    public function save(){
        $this->validate();

        $modulo = $this->modulo;
        $modulo->denominacion = $this->denominacion;
        $modulo->siglas = $this->siglas;
        $modulo->horas = $this->horas;
        $modulo->curso = $this->curso;
        $modulo->especialidad = $this->especialidad;
        $modulo->formacion_id = $this->formacion_id;

        $modulo->save();
        $this->mount();
        $this->dispatch('cerrar_modal');
    }
   /**
     * Sacamos el objeto modulo en función del ID, una vez hecho eso por la relacion 1 a N
     * sacamos todas las lecciones que tiene ese grupo y si la variable lecciones es distinta de null
     * las recorremos una a una y las vamos borrando, una vez eliminado todo eliminamos el modulo.
     *
     */
    public function delete($modulo_id){

        $modulo = Modulo::find($modulo_id);
        $lecciones = $modulo->lecciones;
        if($lecciones != null){
            foreach($lecciones as $leccion){
                $leccion->delete();
            }
        }
        $modulo->delete();
    }

    /**
     * Metodo de validación cuando el usuario hace UPDATE.
     *
     * Se llama con $this->validate(), porque queremos validar los atributos de este componente
     * que son los que el usuario modifica en el form.
     */
    protected $rules=[
        'horas'=>'required',
        'denominacion'=>'required | max:255| min:2',
        'especialidad' => [
            'required',
            'regex:/^(secundaria|formacion profesional)$/i',
        ],
        'siglas'=>'required',
        'curso'=>'required | numeric',
        'formacion_id'=>'required | integer',
    ];

}
