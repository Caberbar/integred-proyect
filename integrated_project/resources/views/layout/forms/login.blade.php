@extends('layout.app')

@section('title', 'Login Form')

@section('content')

    <form action="{{ route('login.confirm') }}" method="POST">
        @csrf

        <label for="email">Email:</label>
        <input type="text" name="email" required placeholder="Insert our email" class="@error('email') danger @enderror" value="{{ old('email')}}">

        <label for="password">Inserte your password:</label>
        <input type="password" name="password" required placeholder="Insert our password" class="@error('password') danger @enderror">

        <label for="remember">Remember me:</label>
        <input type="checkbox" name="remember">
        @error('password')
            <div class="error-message">{{ $message }}</div>
        @enderror
        @error('email')
            <div class="error-message">{{ $message }}</div>
        @enderror
        <input type="submit" value="LOGIN">
    </form>

@endsection
