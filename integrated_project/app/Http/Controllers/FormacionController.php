<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formacion;
use App\Http\Requests\FormacionRequest;

class FormacionController extends Controller
{
    public function create(){
        return view('layout.forms.formationform');
    }

    public function insert(FormacionRequest $request){
        $formacion = new Formacion;
        $formacion->siglas = $request->siglas;
        $formacion->denominacion = $request->denominacion;
        $formacion->save();

        return redirect()->route('formaciones');
    }
}
