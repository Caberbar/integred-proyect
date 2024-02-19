<?php

namespace App\Http\Controllers;

use App\Models\Formacion;
use Illuminate\Http\Request;
use App\http\Requests\GrupoRequest;
use App\Models\Grupo;

class GrupoController extends Controller
{
    public function create(){
        $formaciones = Formacion::all();
        return view('layout.forms.grupoform', compact('formaciones'));
    }

    public function insert(GrupoRequest $request){
        $grupo = new Grupo;

        $grupo->denominacion = $request->denominacion;
        $grupo->turno = $request->turno;
        $grupo->curso_escolar = $request->curso_escolar;
        $grupo->curso = $request->curso;
        $grupo->formacion_id = $request->formacion_id;
        $grupo->save();

        return redirect()->route('grupos');
    }
}
