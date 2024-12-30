<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>SafeCar</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{route('customer.home')}}" class="nav-item nav-link @yield('home-active')">Home</a>
            <a href="{{route('about')}}" class="nav-item nav-link  @yield('about-active')">About</a>
            <a href="{{route('customer-services')}}" class="nav-item nav-link  @yield('services-active')">Services</a>
            <a href="{{route('customer-packages')}}" class="nav-item nav-link  @yield('packages-active')">Packages</a>
            <!-- Button to create a new post -->
            <!-- <a href="{{ route('posts.index') }}" class="nav-item nav-link  @yield('posts-active')">
                Post
            </a> -->
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="booking.html" class="dropdown-item">Booking</a>
                    <a href="team.html" class="dropdown-item">Technicians</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div> -->
            <a href="{{route('customer.contact')}}" class="nav-item nav-link  @yield('contact-active') ">Contact</a>
        </div>
        @if (auth()->check())
         
               
            </a>
            <div class="" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ Auth::user()->car_image == null ? asset('assets/img/icon_car.jpg') : asset('storage/users/' . Auth::user()->car_image) }}"
                            class="rounded-circle shadow img-fluid mx-3" alt="User Profile" style="max-width: 50px;">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"  href="{{ route('profile.edit') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('my-bookings') }}">My Booking</a></li>
                            <li><a class="dropdown-item" href="{{ route('my-subscriptions') }}">My Subscriptions</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Logout button -->
            <a href="{{ route('logout') }}" class="auth-btn login-btn mx-3"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout <i class="fa fa-sign-out-alt "></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <!-- If the user is not logged in -->
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="auth-btn login-btn">
                    Login
                    <i class="fas fa-sign-in-alt"></i>
                </a>
                <a href="{{ route('register') }}" class="auth-btn register-btn">
                    Register
                    <i class="fas fa-user-plus"></i>
                </a>
            </div>
        @endif

    </div>
</nav>
<!-- Navbar End -->