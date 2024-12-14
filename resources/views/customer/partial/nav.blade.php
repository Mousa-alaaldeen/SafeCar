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
        <a href="{{ route('customer-bookings.index') }}" class="nav-item nav-link @yield('bookings-active')">
    <i class="fa fa-calendar-alt"></i>
</a>

            <span class="navbar-text me-3">Welcome, {{ auth()->user()->name }}</span>
            
            <!-- Logout button -->
            <a href="{{ route('logout') }}" class="btn btn-danger py-4 px-lg-5 d-none d-lg-block "
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout <i class="fa fa-sign-out-alt ms-3"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>


            

        @else
            <!-- If the user is not logged in -->
            <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login <i
                    class="fa fa-sign-in-alt ms-3"></i></a>
            <a href="{{ route('register') }}" class="btn btn-secondary py-4 px-lg-5 d-none d-lg-block ms-3">Register <i
                    class="fa fa-user-plus ms-3"></i></a>
        @endif

    </div>
</nav>
<!-- Navbar End -->