<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\Leccion;
use App\Models\Grupo;
use App\Models\Modulo;
use App\Http\Requests\LeccionRequest;

class LeccionController extends Controller
{
    public function create(){
        $profesores = Profesor::all();
        $modulos = Modulo::all();
        $grupos = Grupo::all();

        return view('layout.forms.leccionform', compact('profesores', 'modulos','grupos'));
    }


    public function insert(LeccionRequest $request){
        $leccion = new Leccion;

        $leccion->horas = $request->horas;
        $leccion->modulo_id = $request->modulo_id;
        $leccion->grupo_id = $request->grupo_id;
        $leccion->profesor_id = $request->profesor_id;
        $leccion->save();

        return redirect()->route('lecciones');
    }
}
