<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Admin <b class="font-black">One</b>
    </div>
  </div>
  <div class="menu is-menu-main" style="max-height: 90vh; overflow-y: auto;">
    <p class="menu-label">Admin Management</p>
    <ul class="menu-list">
      <li>
        <a href="{{ route('dashboard.index') }}">
          <span class="icon"><i class="mdi mdi-account-tie"></i></span>
          <span class="menu-item-label">Dashboa</span>
        </a>
      </li>
      <li>
        <a href="{{ route('employees.index') }}">
          <span class="icon"><i class="mdi mdi-account-tie"></i></span>
          <span class="menu-item-label">Employees</span>
        </a>
      </li>
      <li>
        <a href="{{route('services.index')}}">
          <span class="icon"><i class="mdi mdi-tools"></i></span>
          <span class="menu-item-label">Services</span>
        </a>
      </li>
      <li>
        <a href="{{route('admin-bookings.index')}}">
          <span class="icon"><i class="mdi mdi-calendar-multiple-check"></i></span>
          <span class="menu-item-label">Booking </span>
        </a>
      </li>
      <li>
        <a href="{{ route('package.index') }}">
          <span class="icon"><i class="mdi mdi-package"></i></span>
          <span class="menu-item-label">Packages</span>
        </a>
      </li>
      <li>
        <a href="{{ route('subscription.index') }}">
          <span class="icon"><i class="mdi mdi-newspaper"></i></span>
          <span class="menu-item-label">Subscription</span>
        </a>
      </li>
      <li>
        <a href="{{ route('review.index') }}">
          <span class="icon"><i class="mdi mdi-newspaper"></i></span>
          <span class="menu-item-label">Reviews</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin-contact') }}">
          <span class="icon"><i class="mdi mdi-package"></i></span>
          <span class="menu-item-label">Contact</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">User Management</p>
    <ul class="menu-list">
      <li>
        <a href="{{route('users.index')}}">
          <span class="icon"><i class="mdi mdi-account-group"></i></span>
          <span class="menu-item-label">Users</span>
        </a>
      </li>
      <li>
        <a href="#" onclick="confirmLogout(event);">
          <span class="icon"><i class="mdi mdi-lock"></i></span>
          <span class="menu-item-label">Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>

        <script>
          function confirmLogout(event) {
            event.preventDefault(); // Prevent the default link behavior (navigation)

            // Show SweetAlert confirmation dialog
            Swal.fire({
              title: 'Are you sure?',
              text: 'Do you really want to log out?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, log out',
              cancelButtonText: 'Cancel',
            }).then((result) => {
              if (result.isConfirmed) {
                // If confirmed, submit the logout form
                document.getElementById('logout-form').submit();
              }
            });
          }
        </script>
      </li>

    </ul>
  </div>
</aside>