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
        <a href="{{route('bookings-services.index')}}">
          <span class="icon"><i class="mdi mdi-calendar-multiple-check"></i></span>
          <span class="menu-item-label">Booking Services</span>
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
        <a href="{{route('customer.index')}}">
          <span class="icon"><i class="mdi mdi-account-group"></i></span>
          <span class="menu-item-label">Users</span>
        </a>
      </li>
      <li>
        <a href="login.html">
          <span class="icon"><i class="mdi mdi-lock"></i></span>
          <span class="menu-item-label">Login</span>
        </a>
      </li>
      <li>
        <a class="dropdown">
          <span class="icon"><i class="mdi mdi-menu"></i></span>
          <span class="menu-item-label">Submenus</span>
          <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
        </a>
        <ul>
          <li>
            <a href="#void">
              <span class="icon"><i class="mdi mdi-subdirectory-arrow-right"></i></span>
              <span>Sub-item One</span>
            </a>
          </li>
          <li>
            <a href="#void">
              <span class="icon"><i class="mdi mdi-subdirectory-arrow-right"></i></span>
              <span>Sub-item Two</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>

    <!-- قسم "حول" -->
    <p class="menu-label">About</p>
    <ul class="menu-list">
      <li>
        <a href="https://justboil.me" onclick="alert('Coming soon'); return false" target="_blank" class="has-icon">
          <span class="icon"><i class="mdi mdi-credit-card"></i></span>
          <span class="menu-item-label">Premium Demo</span>
        </a>
      </li>
      <li>
        <a href="https://justboil.me/tailwind-admin-templates" class="has-icon">
          <span class="icon"><i class="mdi mdi-information"></i></span>
          <span class="menu-item-label">About</span>
        </a>
      </li>
      <li>
        <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
          <span class="icon"><i class="mdi mdi-github"></i></span>
          <span class="menu-item-label">GitHub</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
