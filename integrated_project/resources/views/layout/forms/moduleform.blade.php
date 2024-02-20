@extends('layout.app')

@section('title', 'Create a new Module')

@section('body')
    <form action="{{route('modulos.insert')}}" method="POST">
        @csrf

        @error('horas')
            <p class="alert alert-danger">Las horas no son validas</p>
        @enderror
        <label for="">Hours</label>
        <input type="number" required name="horas">
        @error('denominacion')
            <p class="alert alert-danger">La denominacion no es valida</p>
        @enderror
        <label for="">Denomination</label>
        <input type="text" required name="denominacion">
        @error('siglas')
            <p class="alert alert-danger">Las siglas no son validas</p>
        @enderror
        <label for="">Acronym</label>
        <input type="text" required name="siglas">
        @error('especialidad')
            <p class="alert alert-danger">La especialidad no es valida</p>
        @enderror
        <label for="">Speciality</label>
        <select name="especialidad">
            <option value="secundaria">Secundaria</option>
            <option value="formacion profesional">Formacion profesional</option>
        </select>
        @error('curso')
            <p class="alert alert-danger">El curso no es valido</p>
        @enderror
        <label for="">Curso</label>
        <select name="curso">
            <option value="1">1º</option>
            <option value="2">2º</option>
            <option value="3">3º</option>
            <option value="4">4º</option>
        </select>

        @error('formacion_id')
            <p class="alert alert-danger">La formación no es válida</p>
        @enderror
        <label for="">Formacion</label>
        <select name="formacion_id">
            @forelse ($formaciones as $formacion)
                <option value="{{ $formacion->id }}">{{ $formacion->denominacion}}</option>
            @empty
                <option>No tienes formaciones</option>
            @endforelse
        </select>
        <input type="submit" value="create">
    </form>
@endsection
