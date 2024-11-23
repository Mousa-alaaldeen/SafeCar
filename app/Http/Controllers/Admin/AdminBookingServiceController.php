<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingService;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBookingServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookingServices = BookingService::paginate(20);
        return view('admin.bookingServices.index', compact('bookingServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $services = Services::all();  
        return view('bookingServices.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function show(string $bookingId, string $serviceId)
    {

        $services = DB::table('services')->get();

        $bookings = DB::table('bookings')->get();
        $bookingService = DB::table('booking_services')
            ->join('bookings', 'booking_services.booking_id', '=', 'bookings.id')  // ربط جدول 'booking_services' مع 'bookings'
            ->join('services', 'booking_services.service_id', '=', 'services.id')  // ربط جدول 'booking_services' مع 'services'
            ->where('booking_services.booking_id', $bookingId)
            ->where('booking_services.service_id', $serviceId)
            ->select(
                'booking_services.*',
                'services.*',
                'bookings.*'
            )
            ->first();


        if (!$bookingService) {
            return response()->json(['success' => false, 'message' => 'Booking service not found'], 404);
        }


        return response()->json([
            'success' => true,
            'bookingService' => $bookingService,
            'services' => $services,
            'bookings' => $bookings
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'service_id' => 'required|exists:services,id',
        ]);


        $existingService = BookingService::where('booking_id', $validated['booking_id'])
            ->where('service_id', $validated['service_id'])
            ->first();

        if ($existingService) {
            return response()->json([
                'success' => false,
                'message' => 'This booking service already exists.',
            ], 400);
        }

        $bookingService = new BookingService();
        $bookingService->booking_id = $validated['booking_id'];
        $bookingService->service_id = $validated['service_id'];
        $bookingService->save();

        return response()->json([
            'success' => true,
            'message' => 'Booking service created successfully.',
            'data' => $bookingService,
        ], 201);
    }
    public function update(Request $request, $bookingId, $serviceId)
    {

        $bookingService = BookingService::where('booking_id', $bookingId)
            ->where('service_id', $serviceId)
            ->first();

        if (!$bookingService) {
            return response()->json(['success' => false, 'message' => 'Booking service not found'], 404);
        }


        $validatedData = $request->validate([
            'service_id' => 'required|exists:services,id',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);


        $bookingService->service_id = $validatedData['service_id'];
        $bookingService->price = $validatedData['price'];
        $bookingService->description = $validatedData['description'];
        $bookingService->save();

        return response()->json(['success' => true, 'message' => 'Booking service updated successfully']);
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($booking_id, $service_id)
    {
        DB::table('booking_services')
            ->where('booking_id', $booking_id)
            ->where('service_id', $service_id)
            ->delete();


        return redirect()->route('bookings-services.index')->with('success', 'Booking service deleted successfully.');
    }




}
