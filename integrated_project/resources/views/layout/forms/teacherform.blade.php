@extends('layout.app')

@section('title','Create a new Teacher')

@section('body')
    <form action="{{route('profesor.insert')}}" method="POST">
        @csrf

        <label for="">User seneca:</label>
        <input type="text" name="usu_seneca" required>

        <label for="">Name:</label>
        <input type="text" name="nombre" required>

        <label for="">First Name</label>
        <input type="text" name="apellido1">

        <label for="">Last Name</label>
        <input type="text" name="apellido2">

        <label for="">Speciality</label>
        <input type="text" name="especialidad">
        <select name="especialidad">
            <option value="secundaria">Secundaria</option>
            <option value="formacion profesional">Formacion profesional</option>
        </select>

        <input type="submit" value="Insert">
    </form>
@endsection
