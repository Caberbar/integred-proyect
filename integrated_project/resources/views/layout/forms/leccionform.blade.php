@extends('layout.app')

@section('title', 'Create a new Lesson')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <form action="{{ route('lecciones.insert') }}" method="POST" id="insert-form">
            @csrf

            <label for="">Hours</label>
            <input type="number" required name="horas" min="1" value="1">
            <p class="error" id="error_horas">Hours must be a number greater than 0.</p>
            @error('horas')
                <p class="error show" id="error_horas">Hours must be a number greater than 0.</p>
            @enderror

            <label for="">Module</label>
            <select name="modulo_id">
                @forelse ($modulos as $modulo)
                    <option value="{{$modulo->id}}"> {{$modulo->denominacion}} </option>
                @empty
                    <option value=null>There is no modules to be asigned.</option>
                @endforelse
            </select>
            @error('modulo_id')
                <p class="error show">Chosen module is not valid.</p>
            @enderror

            <label for="">Teacher</label>
            <select name="profesor_id">
                @forelse ($profesores as $profesor)
                    <option value="{{$profesor->id}}"> {{$profesor->nombre}} </option>
                @empty
                    <option value=null>There is no teachers to be asigned.</option>
                @endforelse
            </select>
            @error('profesor_id')
                <p class="error show">Chosen teacher is not valid.</p>
            @enderror

            <label for="">Group</label>
            <select name="grupo_id">
                @forelse ($grupos as $grupo)
                    <option value="{{$grupo->id}}"> {{$grupo->denominacion}} </option>
                @empty
                    <option value=null>There is no groups to be asigned.</option>
                @endforelse
            </select>
            @error('grupo_id')
                <p class="error show">Chosen group is not valid.</p>
            @enderror

            <input type="submit" value="Enviar" id="insert-submit">
        </form>
    </div>
</div>
@endsection
