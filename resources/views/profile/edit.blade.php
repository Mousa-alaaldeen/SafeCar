@extends('customer.master')

@section('contact')
@section('booking-active', 'active')

<div class="container-xxl py-5">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <!-- Profile Section -->
    <div class="card shadow-lg border-0 rounded-4 mb-5">
        <div class="card-body p-5">
            <div class="row g-4 align-items-center">
                <!-- Profile Image -->
                <div class="col-lg-4 text-center">
                    <img src="{{ $user->car_image == null ? asset('assets/img/icon_car.jpg') : asset('storage/users/' . $user->car_image) }}"
                        class="rounded-circle shadow img-fluid mb-3" alt="User Profile" style="max-width: 200px;">
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
                    <!-- Update Form Section -->
                    <div class="mt-4">
                        <h5 class="text-primary mb-3"><i class="fa fa-edit me-2"></i>Update Personal Information</h5>
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="car_image" class="form-label">Car Image</label>
                                    <input type="file" class="form-control" id="car_image" name="car_image">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="car_type" class="form-label">Car Type</label>
                                    <input type="text" class="form-control" id="car_type" name="car_type" value="{{ $user->car_type }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="car_model" class="form-label">Car Model</label>
                                    <input type="text" class="form-control" id="car_model" name="car_model" value="{{ $user->car_model }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="car_size" class="form-label">Car Size</label>
                                    <input type="text" class="form-control" id="car_size" name="car_size" value="{{ $user->car_size }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="car_license_plate" class="form-label">Car License Plate</label>
                                    <input type="text" class="form-control" id="car_license_plate" name="car_license_plate" value="{{ $user->car_license_plate }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Update Information</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Stats Section -->
    <div class="bg-light rounded p-4 shadow-sm mb-5">
        <h3 class="mb-4 text-primary">Your Booking Statistics</h3>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card shadow-sm py-3">
                    <h5 class="text-primary">
                        <i class="fa fa-list-alt me-2"></i>Total Bookings
                    </h5>
                    <p class="display-6 text-success">{{ $bookings->count() }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm py-3">
                    <h5 class="text-primary">
                        <i class="fa fa-check-circle me-2"></i>Completed Bookings
                    </h5>
                    <p class="display-6 text-success">{{ $completedBookings }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm py-3">
                    <h5 class="text-primary">
                        <i class="fa fa-times-circle me-2"></i>Cancelled Bookings
                    </h5>
                    <p class="display-6 text-danger">{{ $cancelledBookings }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Section -->
    <div class="card shadow-lg border-0 rounded-4 mx-5">
        <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h3>My Bookings</h3>
        </div>
        <div class="card-body">
            @if($bookings->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $booking->service->image == null ? asset('assets/img/service.png') : asset('storage/services/' . $booking->service->image) }}"
                                                class="rounded-circle me-3 shadow-sm" width="50" height="50" alt="Service">
                                            <div>{{ $booking->service->name }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $booking->booking_date }}</td>
                                    <td>
                                        <span class="badge bg-{{ 
                                                              $booking->status == 'Confirmed' ? 'success' :
                            ($booking->status == 'Cancelled' ? 'secondary' :
                                ($booking->status == 'Completed ' ? 'primary' :
                                    'warning')) 
                                                            }}">
                                            {{ $booking->status }}
                                        </span>
                                    </td>
                                    <td>${{ $booking->service->getPriceByCarSize(auth()->user()->car_size) }}</td>
                                    <td>
                                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fa fa-trash"></i> Cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning text-center">
                    <i class="fa fa-calendar-alt me-2"></i>No bookings found.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
