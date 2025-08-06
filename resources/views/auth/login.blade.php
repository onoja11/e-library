@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
            <div class="card border-success border-2 shadow-lg">
                <div class="p-3 text-center text-success h2">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="https://e-library-35a8.onrender.com/login">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" 
                                   required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Login Button --}}
                        <button type="submit" class="btn btn-success w-100">
                            {{ __('Login') }}
                        </button>

                        {{-- GitHub Login --}}
                        <a href="{{ route('github.login') }}" class="btn btn-dark w-100 mt-3">
                            <i class="fa-brands fa-github"></i> Sign In With GitHub
                        </a>

                        {{-- Forgot Password --}}
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-warning w-100 mt-3" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
