<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Services;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::all();
        $bookings = Booking::paginate(20);
        return view('admin.bookings.index', compact('bookings', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all services to populate the service dropdown
        $services = Services::all();

        // Return the view with the services data
        return view('bookings.create', compact('services'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateBookingRequest $request)
    {

        $validatedData = $request->validated();


        $booking = Booking::create([
            'customer_id' => $validatedData['customer_id'],
            'service_id' => $validatedData['service_id'],
            'booking_date' => $validatedData['booking_date'],
            'status' => $validatedData['status'],
        ]);


        if ($booking) {
            return response()->json([
                'success' => true,
                'message' => 'Booking created successfully!',
                'booking' => $booking,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create the booking.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $services = Services::all();
        $booking = Booking::with('user')->find($id);

        if (!$booking) {
            return response()->json(['error' => 'Booking not found.'], 404);
        }
        return response()->json([
            'success' => 'Bookings loaded successfully.',
            'booking' => $booking,
            'services' => $services
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, string $id)
    {

        $validatedData = $request->validated();


        $booking = Booking::findOrFail($id);


        $booking->user_id = $validatedData['user_id'];
        $booking->service_id = $validatedData['service_id'];
        $booking->booking_date = $validatedData['booking_date'];
        $booking->status = $validatedData['status'];


        $booking->save();


        return response()->json([
            'success' => true,
            'message' => 'Booking updated successfully!',
            'booking' => $booking,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'booking not found.');
        }
        $booking->delete();
        return redirect()->back()->with('success', 'booking deleted successfully.');
    }
}
