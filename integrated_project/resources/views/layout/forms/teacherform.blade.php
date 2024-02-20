@extends('layout.app')

@section('title','Create a new Teacher')

@section('body')
    <form action="{{route('profesor.insert')}}" method="POST">
        @csrf

        @error('usu_seneca')
            <p class="alert alert-danger">El usuario no es valido</p>
        @enderror
        <label for="">User seneca:</label>
        <input type="text" name="usu_seneca" required>

        @error('nombre')
            <p class="alert alert-danger">El nombre no es valido</p>
        @enderror
        <label for="">Name:</label>
        <input type="text" name="nombre" required>

        @error('apellido1')
            <p class="alert alert-danger">El apellido no es valido</p>
        @enderror
        <label for="">First Name</label>
        <input type="text" name="apellido1">

        @error('apellido2')
            <p class="alert alert-danger">El apellido segundo no es valido</p>
        @enderror
        <label for="">Last Name</label>
        <input type="text" name="apellido2">

        @error('especialidad')
            <p class="alert alert-danger">La especialidad no es valido</p>
        @enderror
        <label for="">Speciality</label>
        <select name="especialidad">
            <option value="secundaria">Secundaria</option>
            <option value="formacion profesional">Formacion profesional</option>
        </select>

        <input type="submit" value="Insert">
    </form>
@endsection
