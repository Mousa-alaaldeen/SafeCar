@extends('customer.master')

@section('contact')
@section('booking-active', 'active')

<div class="container-xxl py-5">
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

    <!-- Profile Section -->
    <div class="card shadow-lg border-0 rounded-4 mb-5">
        <div class="card-body p-5">
            <div class="row g-4 align-items-center">
                <!-- Profile Image -->
                <div class="col-lg-4 text-center">
                    <!-- Update Form Section (Modal Trigger) -->
                    <div class=" d-flex justify-content-start">
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                            data-bs-target="#updateModal">
                            <i class="fa fa-edit "></i>
                        </button>
                    </div>
                    <!-- Profile Image -->
                    <img src="{{ $user->car_image == null ? asset('assets/img/icon_car.jpg') : asset('storage/users/' . $user->car_image) }}"
                        class="rounded-circle shadow img-fluid mb-3" alt="User Profile" style="max-width: 250px;">
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
                                                <td>JD {{ $booking->service->getPriceByCarSize(auth()->user()->car_size) }}</td>
                                                <td>
                                                    <a href="#editModal{{ $booking->id }}" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <!-- <form action="{{ route('customer-bookings.updateStatus', $booking->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                                            <i class="fa fa-trash"></i> Cancel
                                                        </button>
                                                    </form> -->
                                                </td>
                                            </tr>

                                            <!-- Edit Modal Booking -->
                                            <div class="modal fade" id="editModal{{ $booking->id }}" tabindex="-1"
                                                aria-labelledby="editModalLabel{{ $booking->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $booking->id }}">Edit
                                                                Booking</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('bookings.update', $booking->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="booking_date"
                                                                        class="form-label fw-bold">Booking Date</label>
                                                                    <input type="date" name="booking_date"
                                                                        class="form-control"
                                                                        value="{{ $booking->booking_date }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="time_slot"
                                                                                                    
                                                                        class="form-label fw-bold">Time Slot</label>
                                                                    <input type="time" name="time_slot"
                                                                        class="form-control"
                                                                        value="{{ $booking->time_slot }}" required>
                                                                </div>  
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label fw-bold">Status</label>
                                                                    <select name="status" class="form-select" required>
                                                                        <option value="Confirmed" {{old('status', $booking->status) == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                                        <option value="Cancelled" {{ old('status', $booking->status) == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                                        <option value="Completed" {{ old('status', $booking->status)  == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
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

<!-- Update User Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Personal Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    @error('email')
                        <div class="invalid-feedback text-primary">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="car_image" class="form-label">Car Image</label>
                        <input type="file" class="form-control" id="car_image" name="car_image">
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

                    <div class="mb-3">
                        <label for="car_type" class="form-label">Car Type</label>
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
                    </div>

                    <div class="mb-3">
                        <label for="car_model" class="form-label">Car Model (Year)</label>
                        <select id="car_model" class="form-control @error('car_model') is-invalid @enderror"
                            name="car_model">
                            <option value="{{ $user->car_model }}" disabled selected>{{ $user->car_model }}</option>
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
                        <input type="text" class="form-control" id="car_license_plate" name="car_license_plate"
                            value="{{ old('car_license_plate', $user->car_license_plate) }}" required maxlength="8"
                            placeholder="XX-XXXXX">
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