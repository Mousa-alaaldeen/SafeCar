@extends('customer.master')

@section('contact')
@section('packages-active', 'active')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0"
    style="background-image: url('https://htmlbeans.com/html/carwash/images/img08.jpg');">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Packages</h1>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Success and Error Notifications -->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000
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
            timer: 3000
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
<div class="text-center wow fadeInUp mt-5" data-wow-delay="0.1s">
    <h1 class="mb-5">Packages For All Types of Cars</h1>
</div>

<div class="row g-4 wow fadeInUp mx-5 mb-3" data-wow-delay="0.3s">
        @foreach($packages as $package)
            <div class="col-lg-4 col-md-6">
                <div class="package-card shadow">
                    <div class="package-header text-center text-white">
                        <div class="package-icon">
                            @if ($package->size=='Small')
                                <i class="fas fa-car"></i>
                            @elseif ($package->size=='Medium')
                                <i class="fas fa-car-side"></i>
                            @else
                                <i class="fas fa-bus"></i>
                                
                            @endif
                        </div>
                        <h4 class="mb-0 text-white">{{ $package->name }}</h4>
                        @if($package->featured)
                            <div class="package-badge">Popular</div>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="text-center">
                            <div class="price-tag">
                                {{ $package->price }} <small>JD</small>
                            </div>

                            <div class="d-flex justify-content-center flex-wrap mb-4">
                                <div class="feature-tag">
                                    <i class="fas fa-clock"></i>
                                    {{ $package->duration }}
                                </div>
                                <div class="feature-tag">
                                    <i class="fas fa-car-side"></i>
                                    {{ $package->size }}
                                </div>
                            </div>

                            <div class="service-list">
                                @foreach($package->services as $service)
                                    <div class="service-item">
                                        <i class="fas fa-check-circle"></i>
                                        <span>{{ $service->name }}</span>
                                    </div>
                                @endforeach
                            </div>

                            @if (Auth::check())
                                <form action="{{ route('customer-subscriptions.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                                    <input type="hidden" name="plan_type" value="{{ $package->plan_type }}">
                                   
                                    <button class="select-package-btn">
                                        <i class="fas fa-tools me-2"></i>Select Package
                                    </button>
                                </form>
                            @else
                                <button class="select-package-btn" onclick="showLoginAlert()">
                                    <i class="fas fa-tools me-2"></i>Select Package
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
<!-- Service End -->

@endsection
