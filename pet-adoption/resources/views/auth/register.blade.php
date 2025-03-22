@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 p-4">
                <h3 class="text-center mb-4" style="color: #C6A56D;">Create Account</h3>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 pe-md-4">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input id="first_name" type="text" 
                                    class="form-control @error('first_name') is-invalid @enderror" 
                                    name="first_name" 
                                    value="{{ old('first_name') }}" 
                                    required>
                                @error('first_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input id="middle_name" type="text" 
                                    class="form-control @error('middle_name') is-invalid @enderror" 
                                    name="middle_name" 
                                    value="{{ old('middle_name') }}">
                                @error('middle_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input id="last_name" type="text" 
                                    class="form-control @error('last_name') is-invalid @enderror" 
                                    name="last_name" 
                                    value="{{ old('last_name') }}" 
                                    required>
                                @error('last_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea id="address" 
                                    class="form-control @error('address') is-invalid @enderror" 
                                    name="address" 
                                    rows="3"
                                    required>{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 ps-md-4">
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input id="age" type="number" 
                                    class="form-control @error('age') is-invalid @enderror" 
                                    name="age" 
                                    value="{{ old('age') }}" 
                                    required 
                                    min="18">
                                @error('age')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" 
                                    class="form-control @error('gender') is-invalid @enderror" 
                                    name="gender" 
                                    required>
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="others" {{ old('gender') == 'others' ? 'selected' : '' }}>Others</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    required>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <input id="password-confirm" type="password" 
                                    class="form-control" 
                                    name="password_confirmation" 
                                    required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" 
                                    class="btn text-white py-2"
                                    style="background-color: #C6A56D;">
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-0">
                        Already have an account? 
                        <a href="{{ route('login') }}" 
                           class="text-decoration-none"
                           style="color: #C6A56D;">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control {
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 0.5rem 0.75rem;
    }
    
    .form-control:focus {
        border-color: #C6A56D;
        box-shadow: 0 0 0 0.2rem rgba(198, 165, 109, 0.25);
    }
    
    .btn:hover {
        background-color: #D6B89A !important;
    }
    
    .card {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
