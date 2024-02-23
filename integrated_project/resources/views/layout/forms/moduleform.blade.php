@extends('layout.app')

@section('title', 'Create a new Module')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <form action="{{route('modulos.insert')}}" method="POST" id="insert-form">
            @csrf

            <label for="">Hours</label>
            <input type="number" required name="horas" min="1" value="1">
            <p class="error" id="error_horas">Hours must be a number greater than 0.</p>

            <label for="">Denomination</label>
            <input type="text" required name="denominacion">
            <p class="error" id="error_denominacion">Denomination must be between 3 and 255 characters long.</p>

            <label for="">Acronym</label>
            <input type="text" required name="siglas">
            <p class="error" id="error_siglas">Acronym must be at least 2 characters long.</p>

            <label for="">Speciality</label>
            <select name="especialidad">
                <option value="secundaria">Secondary Education</option>
                <option value="formacion profesional">Vocational Training</option>
            </select>

            <label for="">Course</label>
            <select name="curso">
                <option value="1">1º</option>
                <option value="2">2º</option>
                <option value="3">3º</option>
                <option value="4">4º</option>
            </select>
            <p class="error" id="error_curso">Vocational Training can't have 3rd or 4th course.</p>

            <label for="">Formacion</label>
            <select name="formacion_id">
                @forelse ($formaciones as $formacion)
                    <option value="{{ $formacion->id }}">{{ $formacion->denominacion}}</option>
                @empty
                    <option value=null>You cant create a module, becuase we don´t have Training</option>
                @endforelse
            </select>
            <input type="submit" value="create" id="insert-submit">
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
    </div>  
</div>
<script type="text/javascript" src="{{asset('js/validations/modulo-validation.js')}}"></script>
@endsection
