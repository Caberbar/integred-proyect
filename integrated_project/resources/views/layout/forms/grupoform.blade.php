@extends('layout.app')
@section('title', 'Create a new Group')
@section('body')
    <form action="{{route('grupos.insert')}}" method="POST">
        @csrf
        @error('denominacion')
            <p>La denominacion no es valida</p>
        @enderror
        <label for="">Denominacion</label>
        <input type="text" required name="denominacion">

        @error('turno')
            <p>El turno no es valido</p>
        @enderror
        <label for="">Turno</label>
        <select name="turno">
            <option value="Mañana">Mañana</option>
            <option value="Tarde">Tarde</option>
        </select>

        @error('curso_escolar')
            <p>El curso escolar no es valido</p>
        @enderror
        <label for="">Curso Escolar</label>
        <input type="text" required name="curso_escolar" placeholder="Ej. 2022/2023 - 2023/2024">

        @error('curso')
            <p>El curso  no es valido</p>
        @enderror
        <label for="">Curso</label>
        <select name="curso">
            <option value="1">1º</option>
            <option value="2">2º</option>
            <option value="3">3º</option>
            <option value="4">4º</option>
        </select>
        @error('formacion_id')
            <p>La formacion seleccionada no es valida</p>
        @enderror
        <label for="">Formacion</label>
        <select name="formacion_id">
            @forelse ($formaciones as $formacion)
                <option value="{{$formacion->id}}">{{$formacion->denominacion}}</option>
            @empty
                <option value=null>No hay formaciones</option>
            @endforelse
        </select>

        <input type="submit" value="Send">
    </form>
@endsection
