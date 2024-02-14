<?php

namespace App\Livewire;
use App\Models\Profesor;
use Livewire\Component;

class ProfesorTable extends Component
{

    public $profesor_id, $nombre, $apellido1, $apellido2, $especialidad;

    /**
     * Hook de renderizado de la vista, inicia todos los inpust a default
     */
    public function mount(){
        $this->profesor_id = null;
        $this->nombre = null;
        $this->apellido1 = null;
        $this->apellido2 = null;
        $this->especialidad = null;
    }

    /**
     * Función que obtiene todos los profesores de la base de datos y los renderiza junto a la vista.
     */
    public function render()
    {
        $teachers = Profesor::all();
        return view('livewire.profesor-table', compact('teachers'));
    }
    //Cogemos el profesor que quiere editar el usuario y guardamos los campos en nuestras variables.
    public function edit($profesor_id){
        $profesor = Profesor::findOrFail($profesor_id);

        $this->profesor_id = $profesor->id;
        $this->nombre = $profesor->nombre;
        $this->apellido1 = $profesor->apellido1;
        $this->apellido2 = $profesor->apellido2;
        $this->especialidad = $profesor->especialidad;
    }
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
     */
    public function resetInput(){
        $this->profesor_id = null;
        $this->nombre = null;
        $this->apellido1 = null;
        $this->apellido2 = null;
        $this->especialidad = null;
    }




    /**
     *  Metodo de validación de los campos recibidos en el update.
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
