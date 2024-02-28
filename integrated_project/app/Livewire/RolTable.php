<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class RolTable extends Component
{

    public $accion = 'Edit';
    public $nombre_usuario, $id_usuario,$rol;
    public User $usuario;

    public function mount(){
        $this->nombre_usuario = null;
        $this->rol = null;
        $this->usuario = new User;
    }

    public function render()
    {
        $usuarios = User::all();
        $roles = Role::all();
        return view('livewire.rol-table', compact('usuarios', 'roles'));
    }

    public function modal($usuario_id){
        $this->usuario = User::findOrFail($usuario_id);
        $this->nombre_usuario = $this->usuario->name;
        $this->id_usuario = $this->usuario->id;
    }

    public function save(){
        $this->validate();

        $this->usuario->roles()->attach($this->rol);

        $this->mount();
        $this->dispatch('cerrar_modal');
    }


    protected $rules = [
        'id_usuario' =>[
            'required',
            'integer',
            'min:0'
        ],
        'rol'=>[
            'required',
            'integer',
            'min:0'
        ]
    ];
}
