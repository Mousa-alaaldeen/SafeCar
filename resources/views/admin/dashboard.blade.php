@extends('admin.master')

@section('contact')
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul class="breadcrumb">
      <li>Admin</li>
      <li>Dashboard</li>
    </ul>
  </div>
</section>

<section class="section main-section ">
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
      <!-- Card for Clients -->
      <div class="card shadow-lg hover:shadow-2xl transition-shadow duration-300">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3 class="text-xl font-semibold">Clients</h3>
              <h1 class="text-3xl font-bold">{{$employeesCount}}</h1>
            </div>
            <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
          </div>
        </div>
      </div>

      <!-- Card for Services -->
      <div class="card shadow-lg hover:shadow-2xl transition-shadow duration-300">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3 class="text-xl font-semibold">Service</h3>
              <h1 class="text-3xl font-bold">{{$services}}</h1>
            </div>
            <span class="icon widget-icon text-red-500"><i class="mdi mdi-tools mdi-48px"></i></span>
          </div>
        </div>
      </div>

      <!-- Card for Bookings -->
      <div class="card shadow-lg hover:shadow-2xl transition-shadow duration-300">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3 class="text-xl font-semibold">Bookings</h3>
              <h1 class="text-3xl font-bold">{{$bookings}}</h1>
            </div>
            <span class="icon widget-icon text-blue-500"><i class="mdi mdi-calendar-multiple-check mdi-48px"></i></span>
          </div>
        </div>
      </div>
    </div>

   
</section>
 <!-- Chart Section -->
 <div class="chart-container m-4">
        <h3 class="text-2xl font-semibold m-4">Bookings by Month</h3>
        <canvas id="myChart"></canvas>
    </div>

<section class="section main-section">

    <script>
    // تحويل البيانات التي تم إرسالها من الـ Controller إلى JavaScript
    const months = @json($months); // الأشهر التي تم إرسالها من الـ Controller
    const bookingCounts = @json($bookingCounts); // عدد الحجوزات لكل شهر
    
    // الرسم البياني باستخدام البيانات المرسلة من الـ Controller
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months, // الأشهر من الـ Controller
            datasets: [{
                label: 'Monthly Bookings',
                data: bookingCounts, // عدد الحجوزات لكل شهر
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // اللون الخلفي
                borderColor: 'rgba(75, 192, 192, 1)', // لون الحدود
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</section>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
