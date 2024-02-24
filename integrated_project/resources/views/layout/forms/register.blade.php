@extends('layout.app')

@section('title', 'Register Form')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <form action="{{ route('register.save') }}" method="POST">
            @csrf

            <label for="name">Name:</label>
            <input type="text" name="name" required placeholder="Insert our name" class="@error('name') danger @enderror" value="{{ old('name')}}">
            <label for="email">Email:</label>
            <input type="text" name="email" required placeholder="Insert our email" class="@error('email') danger @enderror" value="{{ old('email')}}">
            <label for="password">Inserte your password:</label>
            <input type="password" name="password" required placeholder="Insert our password" class="@error('password') danger @enderror">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" required placeholder="Insert our password" class="@error('password') danger @enderror">
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror
            @error('password_confirmation')
                <div class="error-message">{{ $message }}</div>
            @enderror
            <input type="submit" value="REGISTER">
        </form>
    </div>
</div>

@endsection
