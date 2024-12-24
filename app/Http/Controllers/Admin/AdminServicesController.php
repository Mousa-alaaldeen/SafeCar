<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Booking;
use App\Models\Services;
use Illuminate\Http\Request;

class AdminServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $services = Services::orderBy('created_at', direction: 'desc')-> paginate(20);
        $bookings = Booking::all();
        return view('admin.service.index', compact('services', 'bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
  
     public function store(UpdateServiceRequest $request)
{
    $validatedData = $request->validated();

    try {
      
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newImageName = time() . '-' . $image->getClientOriginalName();
            
            $image->storeAs('services', $newImageName, 'public');
         
            $validatedData['image'] = $newImageName;
        }

      
        $service = Services::firstOrCreate(
            
            [
                'name' => $validatedData['name'],
                'image' => $validatedData['image'] ?? null,
                'price_small' => $validatedData['price_small'],
                'price_medium' => $validatedData['price_medium'],
                'price_large' => $validatedData['price_large'],
                'description' => $validatedData['description'],
            ]
        );

        
        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    } catch (\Illuminate\Database\QueryException $e) {
      
        return redirect()->route('services.index')->with('error', 'Database error: ' . $e->getMessage());
    }
}

    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Services::find($id);
    
        if (!$service) {
            return response()->json(['error' => 'Service not found.'], 404);
        }
    
       
        return response()->json([
            'success' => 'Service loaded successfully.',
            'service' => $service
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(UpdateServiceRequest $request, string $id)
    {

     
        $validatedData = $request->validated();
        $service = Services::findOrFail($id);
        try{
            $service->name = $validatedData['name'];
            $service->price_small=$validatedData['price_small'];
            $service->price_medium=$validatedData['price_medium'];
            $service->price_large=$validatedData['price_large'];
            $service->description=$validatedData['description'];
    
            if ($request->hasFile('image')) {
                if ($service->image && file_exists(storage_path('app/public/services/' . $service->image))) {
                    unlink(storage_path('app/public/services/' . $service->image));
                }
                $imageName = time() . '.' . $request->image->extension(); 
                $request->image->storeAs('public/services', $imageName);  
                $service->image = $imageName; 
            }
        
            $service->save();
            return redirect()->route('services.index')->with('success', 'Service updated successfully!');

        }catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('services.index')->with('error', 'Database error: ' . $e->getMessage());
        }
       
        
        
    }


    /**
     * Update the specified resource in storage.
     */
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Services::findOrFail($id);

        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }
        $service->delete();
        return redirect()->back()->with('success', 'Service deleted successfully.');
    }

}