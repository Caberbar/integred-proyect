@extends('layout.app')

@section('title', 'Create a new Training')

@section('body')
    <form action="{{ route('formaciones.insert') }}" method="POST">
        @csrf

        @error('siglas')
            <p class="alert alert-danger">Las siglas no tienen un formato valido</p>
        @enderror
        <label for="">Acronym</label>
        <input type="text" name="siglas" required>

        @error('denominacion')
            <p class="alert alert-danger">La denominacion no tienen un formato valido</p>
        @enderror
        <label for="">Denomination</label>
        <input type="text" name="denominacion" required>

        <input type="submit" value="Create">
    </form>
@endsection
