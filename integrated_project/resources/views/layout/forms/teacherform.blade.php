@extends('layout.app')

@section('title','Create a new Teacher')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <form action="{{route('profesor.insert')}}" method="POST" id="insert-form">
            @csrf

            <label for="">Seneca User:</label>
            <input type="text" name="usu_seneca" required>
            <p class="error" id="error_usu_seneca">The Seneca User must be composed of 7 letters and 3 numbers.</p>

            <label for="">First Name:</label>
            <input type="text" name="nombre" required>
            <p class="error" id="error_nombre">Name must be between 3 and 30 characters long.</p>

            <label for="">Last Names</label>
            <input type="text" name="apellido1">
            <input type="text" name="apellido2">
            <p class="error" id="error_apellidos">Each last name must be between 3 and 50 characters long.</p>

            <label for="">Speciality</label>
            <select name="especialidad">
                <option value="secundaria">Secondary Education</option>
                <option value="formacion profesional">Vocational Training</option>
            </select>

            <input type="submit" value="Insert" id="insert-submit">
        </form>
    </div>
</div>
@endsection
