<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Livewire\WithPagination;

class RolTable extends Component
{

    use WithPagination;
    public $accion = 'Edit';
    public $nombre_usuario, $id_usuario, $rol;
    public User $usuario;
    public $roles;

    public function mount()
    {
        $this->nombre_usuario = null;
        $this->rol = null;
        $this->usuario = new User;
        $this->roles = Role::all();
    }

    public $perPage = 10; /*Valor por defecto de numeros de usuarios en una tabla*/
    public $search = ''; /*Valor por defecto de la busqueda*/

    public  $sortDirection = 'ASC'; /*Valor por defecto de la dirección de la tabla*/
    public  $sortColumn = 'name'; /*Valor por defecto de la dirección de la tabla*/

    public function doSort($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }

    // Life cycle hooks
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $usuarios = User::search($this->search)
            ->when($this->sortColumn == 'user_name', function ($query) {
                return $query->orderBy('name', $this->sortDirection);
            })
            ->when($this->sortColumn == 'role_name', function ($query) {
                return $query->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->join('roles', 'role_user.role_id', '=', 'roles.id')
                    ->orderBy('roles.name', $this->sortDirection)
                    ->select('users.*', 'roles.name as role_name');
            })
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);
    
        $roles = Role::all();
    
        return view('livewire.rol-table', compact('usuarios', 'roles'));
    }

    public function modal($usuario_id)
    {
        $this->usuario = User::findOrFail($usuario_id);
        $this->nombre_usuario = $this->usuario->name;
        $this->id_usuario = $this->usuario->id;
    }

    public function save()
    {
        $this->validate();

        $this->usuario->roles()->attach($this->rol);

        $this->mount();
        $this->dispatch('cerrar_modal');
    }


    protected $rules = [
        'id_usuario' => [
            'required',
            'integer',
            'min:0'
        ],
        'rol' => [
            'required',
            'integer',
            'min:0'
        ]
    ];
}
