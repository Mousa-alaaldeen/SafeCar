@extends('customer.master')
@section('contact')
@section('home-active', 'active')

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- First Item -->
            <div class="carousel-item active">
                <img class="w-100" src="https://velikorodnov.com/html/cleansy/images/1920x896_slide3.jpg" alt="Image">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-10 col-lg-7 text-center text-lg-start">
                                <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Reliable Auto Repair
                                    Services</h1>
                                <a href="#" class="btn btn-primary py-3 px-5 animated slideInDown">Get Started<i
                                        class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Item -->
            <div class="carousel-item">
                <img class="w-100" src="https://velikorodnov.com/html/cleansy/images/688x480_img1.jpg" alt="Image">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-10 col-lg-7 text-center text-lg-start">
                                <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Professional Car Wash
                                    Services</h1>
                                <a href="#" class="btn btn-primary py-3 px-5 animated slideInDown">Explore More<i
                                        class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Third Item -->
            <div class="carousel-item">
                <img class="w-100" src="https://velikorodnov.com/html/cleansy/images/1920x930_slide1.jpg" alt="Image">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-10 col-lg-7 text-center text-lg-start">
                                <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Expert Car Maintenance
                                </h1>
                                <a href="#" class="btn btn-primary py-3 px-5 animated slideInDown">Find Out More<i
                                        class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<!-- Carousel End -->

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Water Conservation Section -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex py-5 px-4">
                    <i class="fa fa-water fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Water-Saving Techniques</h5>
                        <p>We use advanced techniques to minimize water usage, ensuring that every wash is as
                            eco-friendly as possible.</p>

                    </div>
                </div>
            </div>
            <!-- Eco-friendly Detergents Section -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="d-flex bg-light py-5 px-4">
                    <i class="fa fa-leaf fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Biodegradable Cleaning Solutions</h5>
                        <p>Our eco-friendly cleaning products break down naturally, leaving no harmful residues behind,
                            ensuring a greener future.</p>
                    </div>
                </div>
            </div>
            <!-- Waste Management Section -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="d-flex py-5 px-4">
                    <i class="fa fa-recycle fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Responsible Waste Disposal</h5>
                        <p>We prioritize environmental safety by ensuring all waste, from water to chemicals, is
                            disposed of responsibly and sustainably.</p>
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

                    <img class="position-absolute img-fluid w-100 h-80"
                        src="https://velikorodnov.com/html/cleansy/images/982x905_img1.png"
                        alt="Eco-Friendly Expertise">

                    <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5"
                        style="background: rgba(0, 0, 0, .15);">
                        <h1 class="display-4 mb-0 text-white">15 <span class="fs-4">Years</span></h1>
                        <h4 class="text-white">Eco-Friendly Expertise</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <h1 class="mb-4"><span class="text-primary">SafeCar</span> Pioneering Eco-Friendly Car Wash Solutions
                </h1>
                <p class="mb-4">At SafeCar, we combine over 15 years of experience with a commitment to the environment.
                    Our mission is to revolutionize car care by using sustainable practices that protect both your
                    vehicle and the planet.</p>
                <p class="mb-4">We don't just wash cars – we wash them responsibly. From water conservation to safe
                    waste disposal and the use of biodegradable detergents, we ensure every aspect of our service is
                    aligned with the principles of sustainability.</p>
                <div class="row g-4 mb-3 pb-3">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">01</span>
                            </div>
                            <div class="ps-3">
                                <h6>15 Years of Experience</h6>
                                <span>With over a decade of expertise, we’ve honed our techniques to deliver the best,
                                    most eco-friendly car wash experience.</span>
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
                                <h6>Eco-Friendly Approach</h6>
                                <span>Our focus is on reducing environmental impact by using efficient water usage,
                                    biodegradable products, and responsible waste management.</span>
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
                                <h6>Safe for Your Car & the Planet</h6>
                                <span>We prioritize both the health of your car and the environment. Our methods are
                                    safe, efficient, and eco-friendly.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Fact Start -->
<div class="container-fluid fact bg-dark my-5 py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-calendar-alt fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                <p class="text-white mb-0">Years Experience</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-cogs fa-2x text-white mb-3"></i>

                <h2 class="text-white mb-2" data-toggle="counter-up">{{$employees}}</h2>
                <p class="text-white mb-0">Expert Technicians</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-smile fa-2x text-white mb-3"></i>

                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                <p class="text-white mb-0">Satisfied Clients</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-check-circle fa-2x text-white mb-3"></i>

                <h2 class="text-white mb-2" data-toggle="counter-up">{{$compleate}}</h2>
                <p class="text-white mb-0">Compleate Projects</p>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->

<!-- Why Choose Us Section -->
<section class="why-choose-us py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1>What Makes Us Stand Out</h1>
        </div>
        <div class="row g-4">
            <!-- Reason 1 -->
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="feature-card p-4 text-center border rounded flex-fill">
                    <i class="fa fa-check-circle fa-3x text-primary mb-3"></i>
                    <h4 class="mb-3">Quality Guaranteed</h4>
                    <p>We provide top-notch services with guaranteed quality for your peace of mind.</p>
                </div>
            </div>
            <!-- Reason 2 -->
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="feature-card p-4 text-center border rounded flex-fill">
                    <i class="fa fa-user fa-3x text-primary mb-3"></i>
                    <h4 class="mb-3">Expert Team</h4>
                    <p>Our team of experts ensures the best results with years of experience.</p>
                </div>
            </div>
            <!-- Reason 3 -->
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="feature-card p-4 text-center border rounded flex-fill">
                    <i class="fa fa-clock fa-3x text-primary mb-3"></i>
                    <h4 class="mb-3">Timely Service</h4>
                    <p>We value your time and make sure all services are delivered on schedule.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Why Choose Us Section -->



<!-- Booking Start -->
<!-- <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-6 py-5">
                <div class="py-5">
                    <h1 class="text-white mb-4">Certified and Award Winning Car Repair Service Provider</h1>
                    <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum.
                        Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero
                        eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit.
                        Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Book For A Service</h1>
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" placeholder="Your Name"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" placeholder="Your Email"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0" style="height: 55px;">
                                    <option selected>Select A Service</option>
                                    <option value="1">Service 1</option>
                                    <option value="2">Service 2</option>
                                    <option value="3">Service 3</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control border-0 datetimepicker-input"
                                        placeholder="Service Date" data-target="#date1" data-toggle="datetimepicker"
                                        style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" placeholder="Special Request"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Booking End -->


<!-- Team Start -->
<!-- <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Our Technicians //</h6>
            <h1 class="mb-5">Our Expert Technicians</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{asset('assets')}}/img/team-1.jpg" alt="">
                        <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="fw-bold mb-0">Full Name</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{asset('assets')}}/img/team-2.jpg" alt="">
                        <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="fw-bold mb-0">Full Name</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{asset('assets')}}/img/team-3.jpg" alt="">
                        <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="fw-bold mb-0">Full Name</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{asset('assets')}}/img/team-4.jpg" alt="">
                        <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="fw-bold mb-0">Full Name</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Team End -->


<!-- Testimonial Start -->
<section id="testimonials" class="testimonials py-5">
    <div class="container">
        <h2 class="text-center mb-4">What people think about our services</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial-card">

                    <p class="testimonial-text">"This service was amazing! I will definitely come back again."</p>
                    <div class="row align-items-center my-4">
                        <div class="col-auto">
                            <img src="{{asset('assets')}}/img/team-3.jpg" alt="Client 1" class="testimonial-img">
                        </div>
                        <div class="col">
                            <h5 class="client-name mb-1">John Doe</h5>
                            <span class="client-position">CEO, Company X</span>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                  
                    <p class="testimonial-text">"Fantastic experience! I highly recommend this service to everyone."</p>
                

                    <div class="row align-items-center my-4">
                        <div class="col-auto">
                            <img src="{{asset('assets')}}/img/team-4.jpg" alt="Client 1" class="testimonial-img">
                        </div>
                        <div class="col">
                        <h5 class="client-name">Jane Smith</h5>
                        <span class="client-position">Founder, Business Y</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    
                    <p class="testimonial-text">"Absolutely the best! The team did an outstanding job."</p>
                  

                    <div class="row align-items-center my-4">
                        <div class="col-auto">
                            <img src="{{asset('assets')}}/img/testimonial-4.jpg" alt="Client 1" class="testimonial-img">
                        </div>
                        <div class="col">
                        <h5 class="client-name">Mark Johnson</h5>
                    <span class="client-position">Manager, Company Z</span>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial End -->
@endsection