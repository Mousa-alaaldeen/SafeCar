<?php
use App\Models\Services;
$services = Services::orderBy('created_at', 'desc')->get();
?>
@extends('customer.master')

@section('contact')
@section('services-active', 'active')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0"
    style="background-image: url('https://htmlbeans.com/html/carwash/images/img08.jpg');">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
        </div>
    </div>
</div>
<!-- Page Header End -->

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 4000
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $errors->first() }}',
            showConfirmButton: false,
            timer: 4000
        });
    </script>
@endif
<script>
    function showLoginAlert() {
        Swal.fire({
            icon: 'warning',
            title: 'Login Required',
            text: 'Please log in to book a service.',
            showConfirmButton: true,
            confirmButtonText: 'Login',
            confirmButtonColor: '#3085d6'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('login') }}";
            }
        });
    }
</script>

<!-- Service Start -->
<div class="container-xxl service py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Explore Our Services</h1>
        </div>
        <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">

            @foreach($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded overflow-hidden">
                        <img src="{{ $service->image ? asset('storage/services/' . $service->image) : asset('assets/img/icon-service.jpg') }}"
                            class="card-img-top" alt="{{ $service->name }}" style="object-fit: cover; height: 250px;">
                        <div class="card-body text-center">
                            <h5 class="card-title text-dark mb-2">{{ $service->name }}</h5>


                            <p class="card-text text-muted small mb-3">{{ Str::limit($service->description, 80) }}</p>
                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h5 class="text-muted mb-0">Small: <span class="text-primary">JD
                                        {{ $service->price_small }}</span></h5>
                                <h5 class="text-muted mb-0">Medium: <span class="text-primary">JD
                                        {{ $service->price_medium }}</span></h5>
                                <h5 class="text-muted mb-0">Large: <span class="text-primary">JD
                                        {{ $service->price_large }}</span></h5>

                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <button class="btn btn-sm btn-primary mt-3" data-bs-toggle="modal"
                                    data-bs-target="#serviceModal-{{ $service->id }}">
                                    See More
                                </button>
                                @auth
                                    @if(auth()->user()->hasUsedService($service->id))
                                        <div class="text-success d-flex align-items-center ms-3">
                                            <i class="fa fa-check-circle me-1"></i>
                                            <span>Used</span>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                        <div class="card-footer bg-light text-center">
                            @if(auth()->check())
                                <button class="btn btn-outline-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#bookingModal{{ $service->id }}">
                                    Booking <i class="fa fa-calendar-alt"></i>
                                </button>
                            @else
                                <button class="btn btn-outline-primary w-100" onclick="showLoginAlert()">
                                    Booking <i class="fa fa-calendar-alt"></i>
                                </button>
                            @endif
                        </div>

                    </div>
                </div>
                <!-- Booking Modal -->
                <div class="modal fade" id="bookingModal{{ $service->id }}" tabindex="-1"
                    aria-labelledby="bookingModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bookingModalLabel">Select Booking Date</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('customer-bookings.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <input type="hidden" name="price"
                                    value="{{auth()->check() ? $service->getPriceByCarSize(auth()->user()->car_size) : '' }}">
                                <input type="hidden" name="booking_datetime" id="booking_datetime_{{ $service->id }}">
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <!-- Booking Date -->
                                    <div class="mb-3">
                                        <label for="booking_date_{{ $service->id }}" class="form-label fw-bold">Booking
                                            Date</label>
                                        <input type="date" name="booking_date" id="booking_date_{{ $service->id }}"
                                            class="form-control rounded-3 shadow-sm" required>
                                    </div>
                                    <!-- Time Slot -->
                                    <div class="mb-3">
                                        <label for="time_slot_{{ $service->id }}" class="form-label fw-bold">Time
                                            Slot</label>
                                        <input type="time" name="time_slot" id="time_slot_{{ $service->id }}"
                                            class="form-control rounded-3 shadow-sm" required>
                                    </div>
                                </div>
                                <!-- Modal Footer -->
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary px-4 rounded-pill"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary px-4 rounded-pill">Confirm
                                        Booking</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Service Details Modal -->
                <div class="modal fade" id="serviceModal-{{ $service->id }}" tabindex="-1"
                    aria-labelledby="serviceModalLabel-{{ $service->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-3 shadow">
                            <!-- Header -->

                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="serviceModalLabel-{{ $service->id }}">Service Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- Body -->
                            <div class="modal-body">
                                <!-- Image -->
                                <div class="text-center mb-4">
                                    <img src="{{ $service->image ? asset('storage/services/' . $service->image) : asset('assets/img/icon-service.jpg') }}"
                                        alt="{{ $service->name }}"
                                        style="width: 150px; height: 150px; object-fit: cover; border-radius: 10px; border: 2px solid #ddd;">
                                </div>
                                <!-- Service Name -->
                                <div class="mb-3">
                                    <h6 class="fw-bold mb-1">Service Name</h6>
                                    <p class="text-muted mb-0">{{ $service->name }}</p>
                                </div>
                                <!-- Description -->
                                <div class="mb-3">
                                    <h6 class="fw-bold mb-1">Description</h6>
                                    <p class="text-muted mb-0">{{ $service->description }}</p>
                                </div>
                                <!-- Prices -->
                                <div class="mb-3">
                                    <h6 class="fw-bold mb-1">Prices</h6>
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                        <span>Small:</span>
                                        <span class="text-primary fw-bold">JD {{ $service->price_small }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                        <span>Medium:</span>
                                        <span class="text-primary fw-bold">JD {{ $service->price_medium }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Large:</span>
                                        <span class="text-primary fw-bold">JD {{ $service->price_large }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer -->
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->

@endsection