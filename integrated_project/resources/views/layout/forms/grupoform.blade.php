@extends('layout.app')
@section('title', 'Create a new Group')
@section('content')
<div class="pc-container">
    <div class="pc-content">
        <form action="{{route('grupos.insert')}}" method="POST" id="insert-form">
            @csrf

            <label for="">Denomination</label>
            <input type="text" required name="denominacion">
            <p class="error" id="error_denominacion">Denomination must be between 3 and 255 characters long.</p>
            @error('denominacion')
                <p class="error show" id="error_denominacion">Denomination must be between 3 and 255 characters long.</p>
            @enderror

            <label for="">Turn</label>
            <select name="turno">
                <option value="Mañana">Mañana</option>
                <option value="Tarde">Tarde</option>
            </select>
            @error('turno')
                <p class="error show">Turn is not valid.</p>
            @enderror

            <label for="">School Year</label>
            <input type="text" required name="curso_escolar" placeholder="Ej. 2022/2023 - 2023/2024">
            <p class="error" id="error_curso_escolar">The format of the School Year must be YYYY/YYYY.</p>
            @error('curso_escolar')
                <p class="error show" id="error_curso_escolar">The format of the School Year must be YYYY/YYYY.</p>
            @enderror

            <label for="">Course</label>
            <select name="curso">
                <option value="1">1º</option>
                <option value="2">2º</option>
                <option value="3">3º</option>
                <option value="4">4º</option>
            </select>
            <p class="error" id="error_curso">Vocational Training can't have 3rd or 4th course.</p>
            @error('curso')
                <p class="error show" id="error_curso">Vocational Training can't have 3rd or 4th course.</p>
            @enderror

            <label for="">Education</label>
            <select name="formacion_id">
                @forelse ($formaciones as $formacion)
                    <option value="{{$formacion->id}}">{{$formacion->denominacion}}</option>
                @empty
                    <option value=null>There are no educations yet...</option>
                @endforelse
            </select>
            @error('formacion_id')
                <p class="error show">The education chosen is not valid.</p>
            @enderror

            <input type="submit" value="Send" id="insert-submit">
        </form>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/validations/grupo-validation.js')}}"></script>
@endsection
