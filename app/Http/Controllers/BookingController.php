<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
   
    public function index()
    {
        $bookings = Booking::with('service')
            ->where('user_id', Auth::id())
            ->orderBy('booking_date', 'desc')->get();
        return view('customer.booking.index', compact('bookings'));
    }

    public function create()
    {
        $services = Services::all(); 
        return view('bookings.create', compact('services'));
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'You need to log in to make a booking.');
        }
   
        $validatedData = $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'time_slot' => 'required',
        ]);
    
        Booking::create([
            'user_id' => auth()->id(),
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'time_slot' => $request->time_slot,
        ]);
    
        return redirect()->back()->with('success', 'Your booking has been confirmed!');
    }
    
    public function destroy($id)
    {
  
        $booking = Booking::where('customer_id', Auth::id())->findOrFail($id);
    
        
        $booking->update(['status' => 'Cancelled']);
    
    
        return redirect()->route('bookings.index')->with('success', 'Booking cancelled successfully!');
    }
    
    
}
