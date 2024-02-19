<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfesorRequest;
use App\Models\Profesor;

class ProfesorController extends Controller
{
    public function create(){
        return view('layout.forms.teacherform');
    }

    public function insert(ProfesorRequest $request){
        $profesor = new Profesor;

        $profesor->usu_seneca = $request->usu_seneca;
        $profesor->nombre = $request->nombre;
        $profesor->apellido1 = $request->apellido1;
        $profesor->apellido2 = $request->apellido2;
        $profesor->especialidad = $request->especialidad;

        $profesor->save();

        return redirect()->route('profesor');
    }
}
