@extends('layout.app')

@section('title', 'Register Form')

@section('content')

<div class="auth-main">
    <div class="auth-wrapper v1">
        <div class="auth-form">
            <div class="card my-5">
                <div class="card-body">
                    <div class="text-center">
                        <a href="#"><img class="img-forms" src="{{ asset('images/logo.png') }}" alt="img"></a>
                        <div class="d-grid my-3">
                        </div>
                    </div>

                    <form action="{{ route('register.save') }}" method="POST">
                        @csrf

                        <h4 class="text-center f-w-500 mb-3">Create a new Account.</h4>
                        <div class="form-group mb-3">
                            <input type="text" name="name" required placeholder="Insert our name" class="@error('name') danger @enderror form-control" value="{{ old('name')}}">
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" name="email" required placeholder="Email Address" class="@error('email') danger @enderror form-control" value="{{ old('email')}}">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" required placeholder="Password" class="@error('password') danger @enderror form-control">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password_confirmation" required placeholder="Confirm Password" class="@error('password') danger @enderror form-control">
                        </div>
                        <div class="d-flex mt-1 justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                                <label class="form-check-label text-muted" for="customCheckc1">I agree to all the Terms &amp; Condition</label>
                            </div>
                        </div>
                        @error('password')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                        @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                        <br>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-4">
                            <h6 class="f-w-500 mb-0">You have an Account?</h6>
                            <a href="{{route('login')}}" class="link-primary">Login Account</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection