<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Profesor;
use App\Models\Role;

class RolTable extends Component
{

    public $accion = 'edit';
    public function render()
    {

        return view('livewire.rol-table');
    }
}
