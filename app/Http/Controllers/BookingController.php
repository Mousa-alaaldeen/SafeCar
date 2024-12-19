<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class BookingController extends Controller
{
   
    public function create()
    {
        $services = Services::all(); 
        return view('bookings.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
        ]);
    
        $service = Services::find($request->service_id);
        $price = $service->getPriceByCarSize(auth()->user()->car_size);
        
        $bookingDateTime = $request->booking_date . ' ' . $request->time_slot;
        $existingBooking = Booking::where('user_id', Auth::id())
            ->whereDate('booking_date', $request->booking_date)
            ->whereBetween('booking_date', [
                Carbon::parse($bookingDateTime)->subMinutes(30),
                Carbon::parse($bookingDateTime)->addMinutes(30)
            ])
            ->exists();
    
        if ($existingBooking) {
            return back()->withErrors(['error' => 'You already have a booking within 30 minutes of the selected time. Please choose a different time.']);
        }
    
        Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'booking_date' => $bookingDateTime,
            'price' => $price,
            'status' => 'Confirmed',
        ]);
    
        return back()->with('success', 'Booking successfully created.');
    }
    
    public function update(Request $request, $id){
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        return back()->with('success', 'Booking updated successfully!');

    }

    public function destroy($id)
    {
  
        $booking = Booking::where('customer_id', Auth::id())->findOrFail($id);
    
        
        $booking->update(['status' => 'Cancelled']);

        return redirect()->route('bookings.index')->with('success', 'Booking cancelled successfully!');
    }
    
    
}
