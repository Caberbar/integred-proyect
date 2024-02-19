<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Grupo;
use App\Models\Formacion;
use App\Models\Leccion;

class GrupoTable extends Component
{

    public $grupo_id, $denominacion,$turno ,$curso_escolar, $curso, $formacion_id;
    public $error;

    /**
     * Es un hook de iniciación de la página web con todos los atributos a null, para evitar problemas de iniciación.
     */
    public function mount(){
        $this->grupo_id = null;
        $this->denominacion = null;
        $this->curso_escolar = null;
        $this->curso = null;
        $this->formacion_id = null;
        $this->turno = null;
        $this->error = null;
    }
    /**
     * Renderizamos la página con todos los datos
     */
    public function render()
    {
        $formaciones = Formacion::all();
        $grupos = Grupo::all();
        return view('livewire.grupo-table', compact('grupos', 'formaciones'));
    }
    /**
     * Una vez el usuario pulsa el boton edit, sincronizamos los datos estaticos de la tabla con los asincronos del componente,
     * mediante la busqueda de este grupo en la base de datos y asignandolo a nuestros atributos, que sera los que el usuario
     * modifique.
     */
    public function edit($grupo_id){
        $grupo = Grupo::findOrFail($grupo_id);

        $this->grupo_id = $grupo->id;
        $this->denominacion = $grupo->denominacion;
        $this->turno = $grupo->turno;
        $this->curso_escolar = $grupo->curso_escolar;
        $this->curso = $grupo->curso;
        $this->formacion_id = $grupo->formacion->id;

    }
    /**
     * Buscamos el objeto al que el usuario quiere hacer la edición y modificamos sus atributos mediante, los
     * atributos que relleno de nuestra clase, pero primero comprobamos que el usuario selecciono un grupo,
     * mediante el id del grupo, que es un campo hidden del formulario, si este viene null, no selecciono ninguno, por lo
     * tanto no hacemos ninguna validacion ni modificacion, mostramos un mensaje de error por la pantalla.
     */
    public function update(){
        if($this->grupo_id != null){
            $this->validate();

            $grupo = Grupo::findOrFail($this->grupo_id);

            $grupo->denominacion = $this->denominacion;
            $grupo->turno = $this->turno;
            $grupo->curso_escolar = $this->curso_escolar;
            $grupo->curso = $this->curso;
            $grupo->formacion_id = $this->formacion_id;
            $grupo->save();

            $this->resetInputs();
        }else{
            $this->error = "No puedes hacer modificar sin seleccionar ningun grupo";
        }
    }

    /**
     * Sacamos el objeto grupo en función del ID, una vez hecho eso por la relacion 1 a N
     * sacamos todas las lecciones que tiene ese grupo y si la variable lecciones es distinta de null
     * las recorremos una a una y las vamos borrando, una vez eliminado todo eliminamos el grupo.
     *
     */
    public function delete($grupo_id){

        $grupo = Grupo::find($grupo_id);
        $lecciones = $grupo->lecciones;
           if($lecciones != null){
                foreach($lecciones as $leccion){
                    $leccion->delete();
                }
           }
        $grupo->delete();
    }

    /**
     * Después de hacer el update necesitamos limpiar los datos, por si quiere editar otro campo evitar tener problemas
     * de sobreescritura de datos, o quiera hacer updates maliciosos.
     */
    public function resetInputs(){
        $this->grupo_id = null;
        $this->denominacion = null;
        $this->curso_escolar = null;
        $this->curso = null;
        $this->formacion_id = null;
        $this->error = null;
    }

    /**
     * Metodo de validación cuando el usuario hace UPDATE.
     *
     * Se llama con $this->validate(), porque queremos validar los atributos de este componente
     * que son los que el usuario modifica en el form.
     */
    public function rules(){
        return [
            'denominacion'=>[
                'required',
                'max:255',
                'min:3'
            ],
            'curso_escolar'=>[
                'required',
                'regex:/^\d{4}\/\d{4}$/i',
            ],
            'curso'=>[
                'required',
            ],
            'turno'=>[
                'required',
                'max:255',
                'regex:/^(Mañana|Tarde)$/i'
            ],
            'formacion_id' => 'required',
        ];
    }
}
