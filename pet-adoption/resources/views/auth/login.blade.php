@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <h3 class="text-center mb-4 fw-bold" style="color: #C6A56D;">Welcome Back</h3>

                    @if (session('success'))
                        <div class="alert mb-4 text-center" 
                             style="background-color: rgba(198, 165, 109, 0.1); 
                                    border: 1px solid #C6A56D; 
                                    color: #C6A56D;
                                    border-radius: 10px;
                                    padding: 12px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label text-muted">Email Address</label>
                            <input id="email" type="email" 
                                class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email" 
                                autofocus
                                style="border-radius: 10px;">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-muted">Password</label>
                            <input id="password" 
                                type="password" 
                                class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                name="password" 
                                required 
                                autocomplete="current-password"
                                style="border-radius: 10px;">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-muted" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" 
                                class="btn btn-lg text-white"
                                style="background: linear-gradient(to right, #D6B89A, #C6A56D); border-radius: 10px;">
                                Login
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-decoration-none" 
                                   href="{{ route('password.request') }}"
                                   style="color: #C6A56D;">
                                    Forgot Your Password?
                                </a>
                            @endif
                        </div>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <p class="text-muted mb-0">
                            Don't have an account yet? 
                            <a href="{{ route('register') }}" 
                               class="text-decoration-none fw-semibold"
                               style="color: #C6A56D;">
                                Sign up
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus {
        border-color: #D6B89A;
        box-shadow: 0 0 0 0.25rem rgba(214, 184, 154, 0.25);
    }
    
    .btn:hover {
        background: linear-gradient(to right, #C6A56D, #D6B89A) !important;
    }
    
    .form-check-input:checked {
        background-color: #C6A56D;
        border-color: #C6A56D;
    }
</style>
@endsection
