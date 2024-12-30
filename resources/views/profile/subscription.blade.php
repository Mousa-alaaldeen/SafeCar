@extends('customer.master')

@section('contact')
@section('booking-active', 'active')
<div class="subscription-section  container-xxl py-5">
    <div class="card-header bg-primary text-white text-center rounded-top-4 mb-4">
        <h3><i class="fas fa-star me-2"></i>My Subscribed Packages</h3>
    </div>

    @if($subscriptions->count() > 0)

    <div class="row g-4 mx-5 mb-3">
    @foreach($subscriptions as $subscription)
        <div class="col-lg-4 col-md-6">
            <div class="subscription-card shadow rounded-3">
               
                <div class="package-header text-center text-white py-3 position-relative ">
                    <h4 class="mb-0 text-white">{{ $subscription->package->name }}</h4>
                    <div class="price-tag mt-2 text-white">
                        <i class="fas fa-tag me-2"></i>
                        JD {{ $subscription->package->price }}
                    </div>
                </div>
                <div class="card-body bg-light">
                    <div class="service-list text-center mb-4">
                        @foreach($subscription->package->services as $service)
                            <div class="service-item d-flex  mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>{{ $service->name }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="info-list">
                        <div class="info-item d-flex justify-content-between">
                            <div class="info-label">Start Date:</div>
                            <div class="info-value">{{ $subscription->start_date->format('M d, Y') }}</div>
                        </div>
                        <div class="info-item d-flex justify-content-between">
                            <div class="info-label">End Date:</div>
                            <div class="info-value">{{ $subscription->end_date->format('M d, Y') }}</div>
                        </div>
                        <div class="info-item d-flex justify-content-between">
                            <div class="info-label">Duration:</div>
                            <div class="info-value">{{ $subscription->package->duration }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

    
    @else
        <div class="text-center py-4">
            <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
            <h5 class="text-muted">You haven't subscribed to any packages yet.</h5>

        </div>
    @endif
</div>
@endsection