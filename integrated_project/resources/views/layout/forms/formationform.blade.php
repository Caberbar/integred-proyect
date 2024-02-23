@extends('layout.app')

@section('title', 'Create a new Training')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <form action="{{ route('formaciones.insert') }}" method="POST" id="insert-form">
            @csrf

            <label for="">Acronym</label>
            <input type="text" name="siglas" required>
            <p class="error" id="error_siglas">Acronym must be at least 2 characters long.</p>
            @error('siglas')
                <p class="error show" id="error_siglas">Acronym must be at least 2 characters long.</p>
            @enderror

            <label for="">Denomination</label>
            <input type="text" name="denominacion" required>
            <p class="error" id="error_denominacion">Denomination must be between 3 and 255 characters long.</p>
            @error('denominacion')
                <p class="error show" id="error_denominacion">Denomination must be between 3 and 255 characters long.</p>
            @enderror

            <input type="submit" value="Create" id="insert-submit">
        </form>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/validations/formacion-validation.js')}}"></script>
@endsection
