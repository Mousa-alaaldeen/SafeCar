<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Admin <b class="font-black"></b>
    </div>
  </div>
  <div class="menu is-menu-main" style="max-height: 90vh; overflow-y: auto;">
    <ul class="menu-list">
    <li class="@yield('dashboard')">
        <a href="{{ route('dashboard.index') }}">
          <span class="icon"><i class="mdi mdi-view-dashboard"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
      <li class="@yield('employees')">
        <a href="{{ route('employees.index') }}">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          <span class="menu-item-label ">Employees</span>
        </a>
      </li>
      <li class="@yield('users')">
        <a href="{{ route('users.index') }}">
          <span class="icon"><i class="mdi mdi-car"></i></span>
          <span class="menu-item-label">Cars</span>
        </a>
      </li>
      <li class="@yield('services')">
        <a href="{{ route('services.index') }}">
          <span class="icon"><i class="mdi mdi-tools"></i></span>
          <span class="menu-item-label ">Services</span>
        </a>
      </li>
      <li class="@yield('booking')" >
        <a href="{{ route('admin-bookings.index') }}">
          <span class="icon"><i class="mdi mdi-calendar-multiple-check"></i></span>
          <span class="menu-item-label ">Booking</span>
        </a>
      </li>
      <li class="@yield('packages')">
        <a href="{{ route('package.index') }}">
          <span class="icon"><i class="mdi mdi-package"></i></span>
          <span class="menu-item-label">Packages</span>
        </a>
      </li>
     <li class="@yield('subscriptions')">
        <a href="{{ route('subscription.index') }}">
          <span class="icon"><i class="mdi mdi-newspaper"></i></span>
          <span class="menu-item-label">Subscription</span>
        </a>
      </li>
      <!-- <li>
        <a href="{{ route('review.index') }}">
          <span class="icon"><i class="mdi mdi-newspaper"></i></span>
          <span class="menu-item-label">Reviews</span>
        </a>
      </li> -->
      <li class="@yield('contactus')" >
        <a href="{{ route('admin-contact') }}">
          <span class="icon"><i class="mdi mdi-email-outline"></i></span>
          <span class="menu-item-label ">Contact</span>
        </a>
      </li>
    </ul>
  
    <ul class="menu-list">
      <li class="{{ Request::is('logout*') ? 'active' : '' }}">
        <a href="#" onclick="confirmLogout(event);">
          <span class="icon"><i class="mdi mdi-logout"></i></span>
          <span class="menu-item-label">Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>

        <script>
          function confirmLogout(event) {
            event.preventDefault(); 
            Swal.fire({
              title: 'Are you sure?',
              text: 'Do you really want to log out?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, log out',
              cancelButtonText: 'Cancel',
            }).then((result) => {
              if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
              }
            });
          }
        </script>
      </li>
    </ul>
  </div>
</aside>
