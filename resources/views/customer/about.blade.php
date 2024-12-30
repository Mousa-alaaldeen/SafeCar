@extends('customer.master')
@section('contact')
@section('about-active', 'active')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0"
    style="background-image:  url('https://velikorodnov.com/html/cleansy/rtl/images/slide1.png');">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
          
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex py-5 px-4">
                    <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">High Quality Service</h5>
                        <p>We provide top-notch services tailored to meet your needs and exceed expectations.</p>
                     
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="d-flex bg-light py-5 px-4">
                    <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Expert Technicians</h5>
                        <p>Our team consists of certified and skilled technicians with years of experience.</p>
          
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="d-flex py-5 px-4">
                    <i class="fa fa-tools fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">State-of-the-Art Equipment</h5>
                        <p>We use the latest technology and equipment to ensure high-quality results every time.</p>
     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->




<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 pt-4" style="min-height: 400px;">
                <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                    <img class="position-absolute img-fluid w-100 h-100" src="https://velikorodnov.com/html/cleansy/images/328x232_img1.jpg"
                        style="object-fit: cover;" alt="">
                    <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5"
                        style="background: rgba(0, 0, 0, .70);">
                        <h1 class="display-4 text-white mb-0" id="years-experience"></h1> <span class="fs-4 text-white">Years</span></h1>
                        <h4 class="text-white">Experience</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h1 class="mb-4"><span class="text-primary">SafeCar</span> is the Best Place for Your Auto Care</h1>
                <p class="mb-4">With over 15 years of experience in the auto care industry, we provide professional, reliable, and affordable services to our clients. We value quality, trust, and customer satisfaction.</p>
                <div class="row g-4 mb-3 pb-3">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">01</span>
                            </div>
                            <div class="ps-3">
                                <h6>Professional & Expert</h6>
                                <span>We have a team of experienced professionals dedicated to delivering quality service.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">02</span>
                            </div>
                            <div class="ps-3">
                                <h6>High-Quality Service Center</h6>
                                <span>Our state-of-the-art service center is equipped to handle all types of auto repair needs.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">03</span>
                            </div>
                            <div class="ps-3">
                                <h6>Award-Winning Technicians</h6>
                                <span>Our technicians have received numerous awards for their outstanding service.</span>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- About End -->





<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        
            <h1 class="mb-5">Our Expert Technicians</h1>
        </div>
        <div class="row g-4">

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($employees as $employee)
                        <div class="swiper-slide">
                            <div class="team-item">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid"
                                        src="{{ $employee->image == null ? asset('assets/img/User_Icon.png') : asset('storage/employees/' . $employee->image) }}"
                                        alt="">
                                    
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="fw-bold mb-0">{{ $employee->name }}</h5>
                                    <small class="text-primary">{{ $employee->service->name }}</small>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>






@endsection