

@extends('customer.master')
@section('contact')
    <div class="container-fluid">
        <div class="row login-container">
            <!-- Image Section -->
            <div class="col-md-7 login-image d-none d-md-flex">
                
            </div>
            
            <!-- Login Form Section -->
            <div class="col-md-5 d-flex align-items-center justify-content-center">
                <div class="login-form w-100 p-4">
                    <!-- Service Icons -->
                    <div class="service-icons">
                        <i class="bi bi-tools service-icon"></i>
                        <i class="bi bi-gear service-icon"></i>
                       <i class="mdi mdi-car service-icon"></i>
                    </div>

                    <h2 class="text-center mb-4">Login to Your Account</h2>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input 
                                    type="email" 
                                    class="form-control" 
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                >
                            </div>
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input 
                                    type="password" 
                                    class="form-control" 
                                    id="password" 
                                    name="password" 
                                    required 
                                    autocomplete="current-password"
                                >
                            </div>
                            @error('password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me and Forgot Password -->
                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="remember_me" 
                                    name="remember"
                                >
                                <label class="form-check-label" for="remember_me">
                                    Remember me
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary text-decoration-none">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Login
                            </button>
                        </div>

                        <!-- Sign Up Link -->
                        <div class="text-center mt-3">
                            <p class="text-muted">
                                Don't have an account? 
                                <a href="{{ route('register') }}" class="text-primary">Sign up</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection