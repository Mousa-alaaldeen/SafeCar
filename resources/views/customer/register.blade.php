<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            --secondary-gradient: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        }

        body {
            background: var(--secondary-gradient);
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .registration-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
        }

        .registration-wrapper {
            display: flex;
            align-items: stretch;
        }

        .registration-info {
            background: var(--primary-gradient);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 40%;
        }

        .registration-form {
            padding: 40px;
            width: 60%;
            background: white;
        }

        .registration-info h2 {
            font-weight: 700;
            margin-bottom: 20px;
        }

        .form-control {
            border: none;
            border-bottom: 2px solid #e0e0e0;
            border-radius: 0;
            padding: 10px 0;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom-color: #2575fc;
        }

        .form-label {
            color: #6c757d;
            font-weight: 500;
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            transition: transform 0.3s ease;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            background: var(--primary-gradient);
        }

        .registration-info-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #fff;
        }

        @media (max-width: 768px) {
            .registration-wrapper {
                flex-direction: column;
            }

            .registration-info, 
            .registration-form {
                width: 100%;
            }

            .registration-info {
                text-align: center;
                padding: 20px;
            }
        }
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container registration-container">
        <div class="registration-wrapper">
            <div class="registration-info">
                <div class="registration-info-icon">
                <img src="{{  asset('assets/img/logo.png') }}"
                alt="User Profile" style="max-width: 150px;"> 
                </div>
                <h2>Welcome to Our Platform</h2>
                <p>Register and get access to exclusive car services and features. Join our community today!</p>
            </div>
            <div class="registration-form">
                <h3 class="mb-4 text-center">Create Your Account</h3>
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" required autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" autocomplete="phone">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="car_size" class="form-label">Car Size</label>
                            <select class="form-select @error('car_size') is-invalid @enderror" id="car_size" name="car_size" required>
                                <option value="">Select Car Size</option>
                                <option value="Small" {{ old('car_size') == 'Small' ? 'selected' : '' }}>Small</option>
                                <option value="Medium" {{ old('car_size') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                <option value="Large" {{ old('car_size') == 'Large' ? 'selected' : '' }}>Large</option>
                            </select>
                            @error('car_size')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="car_type" class="form-label">Car Type</label>
                            <select class="form-select @error('car_type') is-invalid @enderror" id="car_type" name="car_type" required>
                                <option value="" disabled selected>Select Car Type</option>
                                <option value="Toyota" {{ old('car_type') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                <option value="Honda" {{ old('car_type') == 'Honda' ? 'selected' : '' }}>Honda</option>
                                <option value="Ford" {{ old('car_type') == 'Ford' ? 'selected' : '' }}>Ford</option>
                                <option value="BMW" {{ old('car_type') == 'BMW' ? 'selected' : '' }}>BMW</option>
                                <option value="Mercedes" {{ old('car_type') == 'Mercedes' ? 'selected' : '' }}>Mercedes</option>
                                <option value="Audi" {{ old('car_type') == 'Audi' ? 'selected' : '' }}>Audi</option>
                                <option value="Chevrolet" {{ old('car_type') == 'Chevrolet' ? 'selected' : '' }}>Chevrolet</option>
                                <option value="Hyundai" {{ old('car_type') == 'Hyundai' ? 'selected' : '' }}>Hyundai</option>
                                <option value="Kia" {{ old('car_type') == 'Kia' ? 'selected' : '' }}>Kia</option>
                                <option value="Nissan" {{ old('car_type') == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                            </select>
                            @error('car_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="car_model" class="form-label">Car Model (Year)</label>
                            <select class="form-select @error('car_model') is-invalid @enderror" id="car_model" name="car_model" required>
                                <option value="" disabled selected>Select Car Model (Year)</option>
                                @for ($year = date('Y'); $year >= 1980; $year--)
                                    <option value="{{ $year }}" {{ old('car_model') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                            @error('car_model')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="car_license_plate" class="form-label">Car License Plate</label>
                        <input type="text" class="form-control @error('car_license_plate') is-invalid @enderror" id="car_license_plate" name="car_license_plate" value="{{ old('car_license_plate') }}" autocomplete="car_license_plate">
                        @error('car_license_plate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('login') }}" class="text-decoration-none text-muted">Already registered?</a>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>