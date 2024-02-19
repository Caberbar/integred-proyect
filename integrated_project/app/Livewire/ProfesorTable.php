<?php

namespace App\Livewire;
use App\Models\Profesor;
use Livewire\Component;

class ProfesorTable extends Component
{

    public $profesor_id, $nombre, $apellido1, $apellido2, $especialidad;
<<<<<<< HEAD

    /**
     * Hook de renderizado de la vista, inicia todos los inpust a default
=======
    public $error;

    /**
     * Es un hook de iniciación de la página web con todos los atributos a null, para evitar problemas de iniciación.
>>>>>>> logicaApp
     */
    public function mount(){
        $this->profesor_id = null;
        $this->nombre = null;
        $this->apellido1 = null;
        $this->apellido2 = null;
        $this->especialidad = null;
    }

<<<<<<< HEAD
    /**
     * Función que obtiene todos los profesores de la base de datos y los renderiza junto a la vista.
=======
     /**
     * Renderizamos la página con todos los datos
>>>>>>> logicaApp
     */
    public function render()
    {
        $teachers = Profesor::all();
        return view('livewire.profesor-table', compact('teachers'));
    }
<<<<<<< HEAD
    //Cogemos el profesor que quiere editar el usuario y guardamos los campos en nuestras variables.
=======

    /**
     * Una vez el usuario pulsa el boton edit, sincronizamos los datos estaticos de la tabla con los asincronos del componente,
     * mediante la busqueda de este profesor en la base de datos y asignandolo a nuestros atributos, que sera los que el usuario
     * modifique.
     */
>>>>>>> logicaApp
    public function edit($profesor_id){
        $profesor = Profesor::findOrFail($profesor_id);

        $this->profesor_id = $profesor->id;
        $this->nombre = $profesor->nombre;
        $this->apellido1 = $profesor->apellido1;
        $this->apellido2 = $profesor->apellido2;
        $this->especialidad = $profesor->especialidad;
    }
<<<<<<< HEAD
    //Actualizamos un profesor con los datos introducidos en la vista, luego lo validamos con la funcion rules
    public function update(){
        $profesor = Profesor::findOrFail($this->profesor_id);

        $this->validate();

        $profesor->nombre = $this->nombre;
        $profesor->apellido1 = $this->apellido1;
        $profesor->apellido2 = $this->apellido2;
        $profesor->especialidad = $this->especialidad;
        $profesor->save();

        $this->resetInput();
    }

    //Borramos un profesor de la tabla
    public function delete($profesor_id){
        $profesor = Profesor::findOrFail($profesor_id)->delete();
    }

    /**
     *  Despues de hacer un update, limpiamso los inpust para no tener problema con el proximo update que realice el usuario
=======
    /**
     * Buscamos el objeto al que el usuario quiere hacer la edición y modificamos sus atributos mediante, los
     * atributos que relleno de nuestra clase, pero primero comprobamos que el usuario selecciono un profesor,
     * mediante el id del modulo, que es un campo hidden del formulario, si este viene null, no selecciono ninguno, por lo
     * tanto no hacemos ninguna validacion ni modificacion, mostramos un mensaje de error por la pantalla.
     */
    public function update(){
        if($this->profesor_id != null){
            $profesor = Profesor::findOrFail($this->profesor_id);

            $this->validate();

            $profesor->nombre = $this->nombre;
            $profesor->apellido1 = $this->apellido1;
            $profesor->apellido2 = $this->apellido2;
            $profesor->especialidad = $this->especialidad;
            $profesor->save();

            $this->resetInput();
        }else{
            $this->error = "No puedes modificar ningun profesor si no lo seleccionas";
        }
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
     * Después de hacer el update necesitamos limpiar los datos, por si quiere editar otro campo evitar tener problemas
     * de sobreescritura de datos, o quiera hacer updates maliciosos.
>>>>>>> logicaApp
     */
    public function resetInput(){
        $this->profesor_id = null;
        $this->nombre = null;
        $this->apellido1 = null;
        $this->apellido2 = null;
        $this->especialidad = null;
<<<<<<< HEAD
    }




    /**
     *  Metodo de validación de los campos recibidos en el update.
=======
        $this->error = null;
    }

     /**
     * Metodo de validación cuando el usuario hace UPDATE.
     *
     * Se llama con $this->validate(), porque queremos validar los atributos de este componente
     * que son los que el usuario modifica en el form.
>>>>>>> logicaApp
     */
    public function rules(){
        return [
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
