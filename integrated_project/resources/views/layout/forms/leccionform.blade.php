@extends('layout.app')

@section('title', 'Crear una nueva lección')

@section('body')
    <form action="{{ route('lecciones.insert') }}" method="POST">
        @csrf

        @error('horas')
            <p class="alert alert-danger">Las horas no son validas</p>
        @enderror
        <label for="">Cantidad Horas:</label>
        <input type="number" name="horas" required>

        @error('modulo_id')
            <p class="alert alert-danger">El modulo, no es validas</p>
        @enderror
        <label for="">Escoja Modulo</label>
        <select name="modulo_id">
            @forelse ($modulos as $modulo)
                <option value="{{$modulo->id}}"> {{$modulo->denominacion}} </option>
            @empty
                <option>No hay modulos para asignar</option>
            @endforelse
        </select>

        @error('profesor_id')
            <p class="alert alert-danger">El profesor, no es valido/p>
        @enderror
        <label for="">Escoja Profesor</label>
        <select name="profesor_id">
            @forelse ($profesores as $profesor)
                <option value="{{$profesor->id}}"> {{$profesor->nombre}} </option>
            @empty
                <option>No hay profesores para asignar</option>
            @endforelse
        </select>

        @error('grupo_id')
            <p class="alert alert-danger">El grupo, no es valido</p>
        @enderror
        <label for="">Escoja Grupo</label>
        <select name="grupo_id">
            @forelse ($grupos as $grupo)
                <option value="{{$grupo->id}}"> {{$grupo->denominacion}} </option>
            @empty
                <option>No hay grupos para asignar</option>
            @endforelse
        </select>

        <input type="submit" value="Enviar">
    </form>
@endsection
