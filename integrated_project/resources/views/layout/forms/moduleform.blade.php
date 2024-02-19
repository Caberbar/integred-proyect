@extends('layout.app')

@section('title', 'Create a new Module')

@section('body')
    <form action="{{route('modulos.insert')}}" method="POST">
        @csrf

        <label for="">Hours</label>
        <input type="number" required name="horas">

        <label for="">Denomination</label>
        <input type="text" required name="denominacion">

        <label for="">Acronym</label>
        <input type="text" required name="siglas">

        <label for="">Speciality</label>
        <select name="especialidad">
            <option value="secundaria">Secundaria</option>
            <option value="formacion profesional">Formacion profesional</option>
        </select>

        <label for="">Curso</label>
        <select name="curso">
            <option value="1">1º</option>
            <option value="2">2º</option>
            <option value="3">3º</option>
            <option value="4">4º</option>
        </select>

        <label for="">Formacion</label>
        <select name="formacion_id">
            @forelse ($formaciones as $formacion)
                <option value="{{ $formacion->id }}">{{ $formacion->denominacion}}</option>
            @empty
                <option value=null>You cant create a module, becuase we don´t have Training</option>
            @endforelse
        </select>
        <input type="submit" value="create">
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
