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

    public $horas, $leccion_id, $grupo_id, $modulo_id, $profesor_id;

    /**
     * Es un hook de iniciación de la página web con todos los atributos a null, para evitar problemas de iniciación.
     */
    public function mount(){
        $this->horas = null;
        $this->leccion_id = null;
        $this->grupo_id = null;
        $this->modulo_id = null;
        $this->profesor_id = null;
    }

    public $perPage = 10; /*Valor por defecto de numeros de usuarios en una tabla*/
    public $search = ''; /*Valor por defecto de la busqueda*/

    public  $sortDirection = 'ASC'; /*Valor por defecto de la dirección de la tabla*/
    public  $sortColumn = 'horas'; /*Valor por defecto de la dirección de la tabla*/

    
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
        $profesores = Profesor::all(); /* NO FUNCIONA, ARREGLAR */

        $modulos = Modulo::all(); /* NO FUNCIONA, ARREGLAR */

        $grupos = Grupo::all(); /* NO FUNCIONA, ARREGLAR */

        $lecciones = Leccion::search($this->search)
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->perPage);

        return view('livewire.leccion-table', compact('lecciones', 'profesores', 'modulos','grupos'));
    }
    /**
     * Una vez el usuario pulsa el boton edit, sincronizamos los datos estaticos de la tabla con los asincronos del componente,
     * mediante la busqueda de esta lección en la base de datos y asignandolo a nuestros atributos, que sera los que el usuario
     * modifique.
     */
    public function edit($leccion_id){
        $leccion = Leccion::findOrFail($leccion_id);

        $this->leccion_id = $leccion_id;
        $this->modulo_id = $leccion->modulo_id;
        $this->grupo_id = $leccion->grupo_id;
        $this->profesor_id = $leccion->profesor_id;
        $this->horas = $leccion->horas;
    }
     /**
     * Buscamos el objeto al que el usuario quiere hacer la edición y modificamos sus atributos mediante, los
     * atributos que relleno de nuestra clase, pero primero comprobamos que el usuario selecciono una formacion,
     * mediante el id del modulo, que es un campo hidden del formulario, si este viene null, no selecciono ninguno, por lo
     * tanto no hacemos ninguna validacion ni modificacion, mostramos un mensaje de error por la pantalla.
     */
    public function update(){
        $leccion = Leccion::find($this->leccion_id);

        $this->validate();

        $leccion->horas = $this->horas;
        $leccion->modulo_id = $this->modulo_id;
        $leccion->profesor_id = $this->profesor_id;
        $leccion->grupo_id = $this->grupo_id;
        $leccion->save();
        $this->resetInputs();
    }
    /**
     * Buscamos la lección en función de su id, y la eliminamos.
     */
    public function delete($leccion_id){
        Leccion::find($leccion_id)->delete();
    }
    /**
     * Después de hacer el update necesitamos limpiar los datos, por si quiere editar otro campo evitar tener problemas
     * de sobreescritura de datos, o quiera hacer updates maliciosos.
     */
    public function resetInputs(){
        $this->horas = null;
        $this->leccion_id = null;
        $this->grupo_id = null;
        $this->modulo_id = null;
        $this->profesor_id = null;
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
            'horas'=>[
                'required',
                'integer',
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
}
