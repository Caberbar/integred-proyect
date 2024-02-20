<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modulo;
use App\Models\Formacion;
use App\Http\Requests\ModuloRequest;

class ModuloController extends Controller
{
    public function create(){
        $formaciones = Formacion::all();
        return view('layout.forms.moduleform', compact('formaciones'));
    }

    public function insert(ModuloRequest $request){

        if($request->formacion_id != null){
            $modulo = new Modulo;
            $modulo->horas = $request->horas;
            $modulo->denominacion = $request->denominacion;
            $modulo->especialidad = $request->especialidad;
            $modulo->siglas = $request->siglas;
            $modulo->curso = $request->curso;
            $modulo->formacion_id = $request->formacion_id;
            $modulo->save();
            return redirect()->route('modulos');
        }else{
            return redirect()->back()->withErrors(['formacion_id']);
        }
    }
}
