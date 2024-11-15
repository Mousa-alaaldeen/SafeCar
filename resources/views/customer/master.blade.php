<!DOCTYPE html>
<html lang="en">

     @include('customer.partial.head')

<body>
    @include('customer.partial.spinner')

    @include('customer.partial.nav')

    <!-- Different contact  -->
    @yield('contact')

    @include('customer.partial.footer')

     @include('customer.partial.script')
</body>

</html>