<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Modulo;
use App\Models\Formacion;

class ModuloTable extends Component
{
    public $modulo_id, $curso, $formacion_id, $denominacion, $siglas, $horas;
    public $error;
    /**
     * Renderizamos la página con todos los datos
     */
    public function render()
    {
        $modulos = Modulo::all();
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
    }
    /**
     * Una vez el usuario pulsa el boton edit, sincronizamos los datos estaticos de la tabla con los asincronos del componente,
     * mediante la busqueda de este modulo en la base de datos y asignandolo a nuestros atributos, que sera los que el usuario
     * modifique.
     */
    public function edit($modulo_id){
        $modulo = Modulo::findOrFail($modulo_id);

        $this->modulo_id = $modulo_id;
        $this->curso = $modulo->curso;
        $this->denominacion = $modulo->denominacion;
        $this->siglas = $modulo->siglas;
        $this->horas = $modulo->horas;
        $this->formacion_id = $modulo->formacion_id;

    }
    /**
     * Buscamos el objeto al que el usuario quiere hacer la edición y modificamos sus atributos mediante, los
     * atributos que relleno de nuestra clase, pero primero comprobamos que el usuario selecciono un modulo,
     * mediante el id del modulo, que es un campo hidden del formulario, si este viene null, no selecciono ninguno, por lo
     * tanto no hacemos ninguna validacion ni modificacion, mostramos un mensaje de error por la pantalla.
     */
    public function update(){
        if($this->modulo_id != null){
            $modulo = Modulo::findOrFail($this->modulo_id);

            $modulo->denominacion = $this->denominacion;
            $modulo->curso = $this->curso;
            $modulo->siglas = $this->siglas;
            $modulo->horas = $this->horas;
            $modulo->formacion_id = $this->formacion_id;
            $modulo->save();

            $this->resetInputs();
        }else{
            $this->error = "No puedes modificar ningun modulo si no seleccionas uno";
        }
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
     * Después de hacer el update necesitamos limpiar los datos, por si quiere editar otro campo evitar tener problemas
     * de sobreescritura de datos, o quiera hacer updates maliciosos.
     */
    public function resetInputs(){
        $this->modulo_id = null;
        $this->curso = null;
        $this->formacion_id = null;
        $this->denominacion = null;
        $this->siglas = null;
        $this->horas = null;
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
            ],
            'denominacion'=>[
                'required',
                'max:255',
                'min:2'
            ],
            'especialidad'=>[
                'required',
                'regex:/^(secundaria|formacion profesional)$/i',
            ],
            'siglas'=>[
                'required',
            ],
            'curso'=>[
                'required',
                'numeric',
            ]
        ];
    }
}
