@extends('layout.app')

@section('title', 'Create a new Training')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <form action="{{ route('formaciones.insert') }}" method="POST">
            @csrf

            @error('siglas')
                <p>Las siglas no tienen un formato valido</p>
            @enderror
            <label for="">Acronym</label>
            <input type="text" name="siglas" required>

            @error('denominacion')
                <p>La denominacion no tienen un formato valido</p>
            @enderror
            <label for="">Denomination</label>
            <input type="text" name="denominacion" required>

            <input type="submit" value="Create">
        </form>
    </div>
</div>
@endsection
