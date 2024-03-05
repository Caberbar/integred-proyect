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
    public $formacion_id, $siglas, $denominacion;
    public $error;

    /**
     * Es un hook de iniciación de la página web con todos los atributos a null, para evitar problemas de iniciación.
     */
    public function mount()
    {
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


    /**
     * Realiza la ordenación de la tabla según la columna especificada.
     *
     * @param string $column Columna por la cual se realizará la ordenación.
     */
    public function doSort($column)
    {
        // Verifica si la columna de ordenación actual es la misma que la nueva
        if ($this->sortColumn === $column) {
            // Cambia la dirección de la ordenación si la dirección actual es 'ASC', de lo contrario, la establece en 'ASC'
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        // Establece la nueva columna de ordenación y la dirección como 'ASC'
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }

    /**
     * Hook del ciclo de vida: Se ejecuta cuando se actualiza el número de elementos por página.
     * Reinicia la página a la primera cuando se modifica el número de elementos por página.
     */
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    /**
     * Hook del ciclo de vida: Se ejecuta cuando se actualiza el término de búsqueda.
     * Reinicia la página a la primera cuando se realiza una nueva búsqueda.
     */
    public function updatedSearch()
    {
        $this->resetPage();
    }

    /**
     * Renderiza la página con todos los datos de formación ordenados y paginados.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        // Obtiene los datos de formación con la búsqueda y ordenación aplicadas, y los paginan según el número especificado por página.
        $formaciones = Formacion::search($this->search)
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);

        // Retorna la vista 'livewire.formacion-table' con los datos de formación paginados.
        return view('livewire.formacion-table', compact('formaciones'));
    }

    /**
     * Una función que realiza dos trabajos en uno, depende de que boton pulse en la vista viene con una variable o no,
     * en el caso de que no venga con esta se le inicializa a null.
     *
     * Si esta es null, quiere decir que se va a crear un nuevo registro, en caso de que sea distinto a null es que se va a
     * editar un registro, por lo tanto inicializamos todas nuestras variables con los datos de la BD.
     */
    public function modal($formacion_id = null)
    {
        if ($formacion_id != null) {
            $this->accion = 'Update';
            $this->formacion = Formacion::findOrFail($formacion_id);
            $this->denominacion = $this->formacion->denominacion;
            $this->siglas = $this->formacion->siglas;
        } else {
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
    public function save()
    {
        $this->validate();
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
    public function delete($formacion_id)
    {
        $formacion = Formacion::find($formacion_id);
        $modulos = $formacion->modulos;

        if ($modulos != null) {
            foreach ($modulos as $modulo) {
                $lecciones = $modulo->lecciones;
                foreach ($lecciones as $leccion) {
                    $leccion->delete();
                }
                $modulo->delete();
            }
        }
        $grupos = $formacion->grupos;
        if ($grupos != null) {
            foreach ($grupos as $grupo) {
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
            'siglas' => [
                'required',
                'min:3',
            ],
            'denominacion' => [
                'required',
                'max:255',
                'min:3'
            ],
        ];
    }
}
