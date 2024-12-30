@extends('customer.master')

@section('contact')
@section('booking-active', 'active')

<div class="container-xxl py-5">
    <!-- Notification for Upcoming Booking -->
    @foreach($bookings as $booking)
        @php
            $bookingDate = \Carbon\Carbon::parse($booking->booking_date);

            $currentDate = \Carbon\Carbon::now();

            $daysDifference = $bookingDate->diffInDays($currentDate);
        @endphp

        @if($daysDifference <= 2 && $booking->status == 'Confirmed')

            <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                <strong>Reminder:</strong> Your booking for <strong>{{ $booking->service->name }}</strong> is in
                <strong>{{ $daysDifference }} day(s)</strong> on
                <strong>{{ $bookingDate->format('F j, Y') }}</strong>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endforeach
    <!-- Profile Section -->
    <div class="card shadow-lg border-0 rounded-4 mb-5">
        <div class="card-body p-5">
            <div class="row g-4 align-items-center">
                <!-- Profile Image -->
                <div class="col-lg-4 text-center">
                    <!-- Update Form Section (Modal Trigger) -->
                    <div class="d-flex justify-content-start">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#updateModal">
                            <i class="fa fa-edit"></i>
                        </button>
                    </div>
                    <!-- Profile Image -->
                    <img src="{{ $user->car_image == null ? asset('assets/img/icon_car.jpg') : asset('storage/users/' . $user->car_image) }}"
                        class="rounded-circle shadow img-fluid mb-3" alt="User Profile" style="max-width: 120px;">
                    <!-- User Name -->
                    <h2 class="text-primary">{{ ucwords($user->name) }}</h2>
                </div>
                <!-- Personal and Car Information -->
                <div class="col-lg-8">
                    <div class="row g-4">
                        <!-- Personal Information -->
                        <div class="col-md-6">
                            <div class="p-4 rounded shadow-sm bg-light">
                                <h5 class="text-primary mb-3"><i class="fa fa-user me-2"></i>Personal Information</h5>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Phone:</strong> {{ $user->phone }}</p>
                            </div>
                        </div>
                        <!-- Car Information -->
                        <div class="col-md-6">
                            <div class="bg-light p-4 rounded shadow-sm">
                                <h5 class="text-primary mb-3"><i class="fa fa-car me-2"></i>Car Information</h5>
                                <p><strong>Type:</strong> {{ $user->car_type }}</p>
                                <p><strong>Model:</strong> {{ $user->car_model }}</p>
                                <p><strong>Size:</strong> {{ $user->car_size }}</p>
                                <p><strong>License:</strong> {{ $user->car_license_plate }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- Modal for profile update -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Your Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="car_image" class="form-label">Car Image</label>
                        <input type="file" class="form-control" name="car_image">
                    </div>
                    <!-- Car Size -->
                    <div class="mb-3">
                        <label for="car_size"
                            style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Car
                            Size:</label>
                        <select id="car_size" name="car_size"
                            class="form-control @error('car_size') is-invalid @enderror">
                            <option value="Small" {{ old('car_size', $user->car_size) == 'Small' ? 'selected' : '' }}>
                                Small</option>
                            <option value="Medium" {{ old('car_size', $user->car_size) == 'Medium' ? 'selected' : '' }}>
                                Medium</option>
                            <option value="Large" {{ old('car_size', $user->car_size) == 'Large' ? 'selected' : '' }}>
                                Large</option>
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
                            <option value="Toyota" {{ old('car_type', $user->car_type) == 'Toyota' ? 'selected' : '' }}>
                                Toyota</option>
                            <option value="Honda" {{ old('car_type', $user->car_type) == 'Honda' ? 'selected' : '' }}>
                                Honda</option>
                            <option value="Ford" {{ old('car_type', $user->car_type) == 'Ford' ? 'selected' : '' }}>Ford
                            </option>
                            <option value="BMW" {{ old('car_type', $user->car_type) == 'BMW' ? 'selected' : '' }}>BMW
                            </option>
                            <option value="Mercedes" {{ old('car_type', $user->car_type) == 'Mercedes' ? 'selected' : '' }}>Mercedes</option>
                            <option value="Audi" {{ old('car_type', $user->car_type) == 'Audi' ? 'selected' : '' }}>Audi
                            </option>
                            <option value="Chevrolet" {{ old('car_type', $user->car_type) == 'Chevrolet' ? 'selected' : '' }}>Chevrolet</option>
                            <option value="Hyundai" {{ old('car_type', $user->car_type) == 'Hyundai' ? 'selected' : '' }}>
                                Hyundai</option>
                            <option value="Kia" {{ old('car_type', $user->car_type) == 'Kia' ? 'selected' : '' }}>Kia
                            </option>
                            <option value="Nissan" {{ old('car_type', $user->car_type) == 'Nissan' ? 'selected' : '' }}>
                                Nissan</option>
                        </select>
                        @error('car_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Car Model (Year) -->
                    <div class="mb-3">
                        <label for="car_model" class="form-label">{{ __('Car Model (Year)') }}</label>
                        <select id="car_model" class="form-control @error('car_model') is-invalid @enderror"
                            name="car_model">
                            <option value="" disabled selected>{{ __('Select Car Model (Year)') }}</option>
                            @for ($year = date('Y'); $year >= 1980; $year--)
                                <option value="{{ $year }}" {{ old('car_model', $user->car_model) == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                        @error('car_model')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="car_license_plate" class="form-label">Car License Plate</label>
                        <input type="text" class="form-control" name="car_license_plate"
                            value="{{ old('car_license_plate', $user->car_license_plate) }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection




@if(session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('status') }}',
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    @endif