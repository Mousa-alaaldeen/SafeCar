@extends('customer.master')
@section('contact')
@section('contact-active', 'active')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0"
    style="background-image: url('{{ asset('assets/img/carousel-bg-1.jpg') }}');">

    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Get In Touch //</h6>
            <h1 class="mb-5">We Are Here To Assist You</h1>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <div class="bg-light d-flex flex-column justify-content-center p-4">
                            <h5 class="text-uppercase">// Booking Inquiries //</h5>
                            <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i>book@company.com</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light d-flex flex-column justify-content-center p-4">
                            <h5 class="text-uppercase">// General Information //</h5>
                            <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i>info@company.com</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light d-flex flex-column justify-content-center p-4">
                            <h5 class="text-uppercase">// Technical Support //</h5>
                            <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i>support@company.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115407.64441775892!2d35.83917529882038!3d31.963158456381536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151b5f87c973a281%3A0xc84f762eb93e69d7!2sAmman%2C%20Jordan!5e0!3m2!1sen!2sjo!4v1699736225113!5m2!1sen!2sjo"
                    frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <p class="mb-4">If you have any questions, feel free to reach out through the contact form below. We
                        are here to provide you with the best assistance. Don't hesitate to contact us!</p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('contact.store')}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name"
                                        name="name">
                                    <label for="name">Your Name</label>
                                    @error('name')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email"
                                        name="email">
                                    <label for="email">Your Email</label>
                                    @error('email')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="services" name="services_id"
                                        aria-label="Select a service">
                                        <option selected disabled>Choose a service</option>
                                        @if (count($services) > 0)
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <label for="services">Service</label>
                                    @error("services")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject"
                                        name="subject">
                                    <label for="subject">Subject</label>
                                    @error("subject")
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 100px" name="message"></textarea>
                                    <label for="message">Message</label>
                                    @error('message')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection