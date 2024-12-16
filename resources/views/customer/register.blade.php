@extends('customer.master')

@section('contact')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>{{ __('Register') }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text"
                                name="name" value="{{old('name')}}" autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                                name="email" value="{{old('email')}}" autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ __('Phone') }}</label>
                            <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="text"
                                name="phone" value="{{ old('phone') }}" autocomplete="phone">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Car Size -->
                        <div class="mb-3">
                            <label for="car_size"
                                style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Car
                                Size:</label>
                            <select id="car_size" name="car_size"
                                class="form-control @error('car_size') is-invalid @enderror">
                                <option value="Small" {{ old('car_size') == 'Small' ? 'selected' : '' }}>Small</option>
                                <option value="Medium" {{ old('car_size') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                <option value="Large" {{ old('car_size') == 'Large' ? 'selected' : '' }}>Large</option>
                            </select>
                            @error('car_size')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Car Type -->
                        <div class="mb-3">
                            <label for="car_type" class="form-label">{{ __('Car Type') }}</label>
                            <select id="car_type" class="form-control @error('car_type') is-invalid @enderror"
                                name="car_type">
                                <option value="" disabled selected>{{ __('Select Car Type') }}</option>
                                <option value="Toyota" {{ old('car_type') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                <option value="Honda" {{ old('car_type') == 'Honda' ? 'selected' : '' }}>Honda</option>
                                <option value="Ford" {{ old('car_type') == 'Ford' ? 'selected' : '' }}>Ford</option>
                                <option value="BMW" {{ old('car_type') == 'BMW' ? 'selected' : '' }}>BMW</option>
                                <option value="Mercedes" {{ old('car_type') == 'Mercedes' ? 'selected' : '' }}>Mercedes
                                </option>
                                <option value="Audi" {{ old('car_type') == 'Audi' ? 'selected' : '' }}>Audi</option>
                                <option value="Chevrolet" {{ old('car_type') == 'Chevrolet' ? 'selected' : '' }}>Chevrolet
                                </option>
                                <option value="Hyundai" {{ old('car_type') == 'Hyundai' ? 'selected' : '' }}>Hyundai
                                </option>
                                <option value="Kia" {{ old('car_type') == 'Kia' ? 'selected' : '' }}>Kia</option>
                                <option value="Nissan" {{ old('car_type') == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                            </select>
                            @error('car_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Car Model -->
                        <div class="mb-3">
                            <label for="car_model" class="form-label">{{ __('Car Model (Year)') }}</label>
                            <select id="car_model" class="form-control @error('car_model') is-invalid @enderror"
                                name="car_model">
                                <option value="" disabled selected>{{ __('Select Car Model (Year)') }}</option>
                                @for ($year = date('Y'); $year >= 1980; $year--)
                                    <option value="{{ $year }}" {{ old('car_model') == $year ? 'selected' : '' }}>{{ $year }}
                                    </option>
                                @endfor
                            </select>
                            @error('car_model')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Car License Plate -->
                        <div class="mb-3">
                            <label for="car_license_plate" class="form-label">{{ __('Car License Plate') }}</label>
                            <input id="car_license_plate"
                                class="form-control @error('car_license_plate') is-invalid @enderror" type="text"
                                name="car_license_plate" value="{{ old('car_license_plate') }}"
                                autocomplete="car_license_plate">
                            @error('car_license_plate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" class="form-control @error('password') is-invalid @enderror"
                                type="password" name="password" autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                type="password" name="password_confirmation" autocomplete="new-password">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a class="text-decoration-none" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection