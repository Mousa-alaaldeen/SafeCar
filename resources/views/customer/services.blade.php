<?php

use App\Models\Services;

$services = Services::orderBy('created_at', 'desc')->get();

?>
@extends('customer.master')

@section('contact')
@section('services-active', 'active')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0"
    style="background-image: url('{{ asset('assets/img/carousel-bg-1.jpg') }}');">
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

<!-- Service Start -->
<div class="container-xxl service py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Explore Our Services</h1>
        </div>
        <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
            @foreach($services as $service)
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-lg rounded">
                        <img src="{{ $service->image == null ? asset('assets/img/icon-service.jpg') : asset('storage/services/' . $service->image) }}"
                            class="card-img-top" style="object-fit: cover; height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $service->name }}</h5>
                            <p class="card-text text-muted mb-2">{{ \Str::limit($service->description, 100) }}</p>
                            <!-- Price with See More Button -->
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title text-primary mb-0 flex-grow-1">
                                    JD {{ $service->price }}
                                </h5>
                                <button type="button" class="btn btn-primary btn-sm ms-3" data-bs-toggle="modal"
                                    data-bs-target="#serviceModal-{{ $service->id }}">
                                    See More
                                </button>
                            </div>

                        </div>
                        <div class="card-footer text-center d-flex flex-column gap-2">
                            <!-- Add to Cart Button -->
                            <a href="add-to-cart/{{ $service->id }}" class="btn btn-outline-primary py-2 px-4">
                                Add to Cart
                                <i class="fa fa-cart-plus ms-2"></i>
                            </a>

                        </div>
                    </div>
                </div>
                <!--  Service Modal -->
                <div class="modal fade" id="serviceModal-{{ $service->id }}" tabindex="-1"
                    aria-labelledby="serviceModalLabel-{{ $service->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered custom-modal-size">
                        <div class="modal-content rounded-3 shadow-lg">
                            <!-- Modal Header -->
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="serviceModalLabel-{{ $service->id }}">Service Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <form class="readonly-form">
                                    <!-- Image -->
                                    <div class="mb-3  text-center">
                                        <img src="{{ $service->image == null ? asset('assets/img/icon-service.jpg') : asset('storage/services/' . $service->image) }}"
                                            alt="{{ $service->name }}"
                                            style="max-width: 150px; height: 150px; border-radius: 10px; object-fit: cover;">
                                    </div>
                                    <!-- Service Name -->
                                    <div class="mb-3">
                                        <label for="service_name" class="form-label fw-bold">Service Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $service->name }}"
                                            readonly>
                                    </div>
                                    <!-- Description -->
                                    <div class="mb-3">
                                        <label for="service_description" class="form-label fw-bold">Description</label>
                                        <textarea name="description" class="form-control" rows="9"
                                            readonly>{{ $service->description }}</textarea>
                                    </div>
                                    <!-- Price -->
                                    <div class="mb-3">
                                        <label for="service_price" class="form-label fw-bold">Price</label>
                                        <div class="input-group">
                                            <input type="text" name="price" class="form-control"
                                                value="{{ $service->price }}" readonly>
                                            <span class="input-group-text">USD</span> 
                                        </div>
                                    </div>
                                    <!-- Close Button -->
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
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