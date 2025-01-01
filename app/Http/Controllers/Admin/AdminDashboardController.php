<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\Services;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
  // Controller Code
public function index()
{
    $bookings = Booking::count();
    $services = Services::count();
    $employeesCount = Employee::count();


    $monthlyBookings = Booking::selectRaw('MONTH(booking_date) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->get();

   
    $months = $monthlyBookings->pluck('month')->toArray();
    $bookingCounts = $monthlyBookings->pluck('count')->toArray();

    return view('admin.dashboard', compact('bookings', 'services', 'employeesCount', 'months', 'bookingCounts'));
}

}
