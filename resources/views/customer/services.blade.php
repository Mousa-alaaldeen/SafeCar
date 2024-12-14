<?php

use App\Models\Services;

$services = Services::orderBy('created_at', 'desc')->get();

?>
@extends('customer.master')

@section('contact')
@section('services-active', 'active')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0"
    style="background-image: url('https://velikorodnov.com/html/cleansy/rtl/images/slide1.png');">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb">
                <!-- Add breadcrumb here if needed -->
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Service Start -->
<div class="container-xxl service py-5">
    <div class="container">
        <!-- Section Title -->
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Explore Our Services</h1>
        </div>
        <!-- Service Cards -->
        <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
            @foreach($services as $service)
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded overflow-hidden">
                        <!-- Service Image -->
                        <img src="{{ $service->image == null ? asset('assets/img/icon-service.jpg') : asset('storage/services/' . $service->image) }}"
                            class="card-img-top" style="object-fit: cover; height: 250px;">
                        <!-- Card Body -->
                        <div class="card-body text-center">
                            <h5 class="card-title text-dark mb-2">{{ $service->name }}</h5>
                            <p class="card-text text-muted small mb-3">{{ \Str::limit($service->description, 80) }}</p>
                            <!-- Price and Button -->
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="text-primary mb-0">JD {{ $service->price }}</h5>
                                <button type="button" class="btn btn-sm btn-primary ms-3" data-bs-toggle="modal"
                                    data-bs-target="#serviceModal-{{ $service->id }}">
                                    See More
                                </button>
                            </div>
                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer bg-light text-center">
                            <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#bookingModal{{ $service->id }}">
                                Add to Cart <i class="fa fa-cart-plus ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal لتحديد الموعد -->
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
                                <div class="mb-3">
                                    <label for="booking_date" class="form-label">Booking Date</label>
                                    <input type="date" name="booking_date" id="booking_date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="time_slot" class="form-label">Time Slot</label>
                                    <input type="time" name="time_slot" id="time_slot" class="form-control" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Confirm Booking</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal for Service Details -->
                <div class="modal fade" id="serviceModal-{{ $service->id }}" tabindex="-1"
                    aria-labelledby="serviceModalLabel-{{ $service->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-3">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="serviceModalLabel-{{ $service->id }}">Service Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <img src="{{ $service->image == null ? asset('assets/img/icon-service.jpg') : asset('storage/services/' . $service->image) }}"
                                        alt="{{ $service->name }}"
                                        style="width: 150px; height: 150px; object-fit: cover; border-radius: 10px;">
                                </div>
                                <h6 class="fw-bold">Service Name</h6>
                                <p class="mb-3">{{ $service->name }}</p>
                                <h6 class="fw-bold">Description</h6>
                                <p class="text-muted">{{ $service->description }}</p>
                                <h6 class="fw-bold">Price</h6>
                                <p class="text-primary fw-bold">JD {{ $service->price }}</p>
                            </div>
                            <div class="modal-footer">
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