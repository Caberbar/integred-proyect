@extends('layout.app')

@section('title', 'Login Form')

@section('content')

    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="#"><img class="img-forms" src="{{ asset('images/logo.png') }}" alt="img"></a> <!-- LOGO -->

                            <div class="d-grid my-3">
                            </div>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger mt-2">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('login.confirm') }}" method="POST">

                            @csrf
                            <h4 class="text-center f-w-500 mb-3">Login with your email</h4>
                            @error('email')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-3">
                                <input type="text" name="email" required placeholder="Email Address"
                                    class="@error('email') danger @enderror form-control" value="{{ old('email') }}">
                            </div>
                            @error('password')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-3">
                                <input type="password" name="password" required placeholder="Password"
                                    class="@error('password') danger @enderror form-control">
                            </div>
                            <br>
                            <div class="d-flex mt-1 justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                                        checked="">
                                    <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-end mt-4">
                            <h6 class="text-secondary f-w-400 mb-0">Don't have an Account?</h6>
                            <a href="{{ route('register') }}" class="link-primary">Create Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
